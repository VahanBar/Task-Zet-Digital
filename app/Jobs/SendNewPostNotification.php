<?php

namespace App\Jobs;

use App\Models\Post;
use App\Notifications\NewPostNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendNewPostNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Post $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function handle(): void
    {
        $postUsers = $this->post->postUsers;
        $postUsersToArray = $postUsers->toArray();

        if ($postUsers) {
            Log::error('Website not found for post', ['post_id' => $this->post->id]);
            return;
        }

        $alreadySent = DB::table('post_user_sent')
            ->where('post_id', $postUsersToArray[0]['post_id'])
            ->pluck('user_id')
            ->toArray();

        $subscribers = $postUsers->subscribers()
            ->whereNotIn('users.id', $alreadySent)
            ->get();

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new NewPostNotification($this->post));

            DB::table('post_user_sent')->insert([
                'user_id' => $subscriber->id,
                'post_id' => $this->post->id,
                'sent_at' => now(),
            ]);
        }
    }
}
