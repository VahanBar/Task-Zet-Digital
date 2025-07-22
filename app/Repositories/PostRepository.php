<?php

namespace App\Repositories;

use App\Jobs\SendNewPostNotification;
use App\Models\Post;
use App\Models\PostUser;
use Illuminate\Database\Eloquent\Collection;

final readonly class PostRepository
{
    protected Post $model;

    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    public function getList(): Collection
    {
        return $this->model->all();
    }

    public function store(array $data): Post
    {
        $post = $this->model->query()->create([
            'title' => $data['title'],
            'body' => $data['body'],
        ]);

        PostUser::create([
            'post_id' => $post->id,
            'user_id' => $data['user_id']
        ]);

        $post = Post::with('postUsers')->findOrFail($post->id);

        dispatch(new SendNewPostNotification($post));

        return $post;
    }

    public function show(int $id): Post
    {
        return $this->model->query()->findOrFail($id);
    }

    public function update(array $updatePost): bool
    {
        return $this->model->query()->findOrFail($updatePost['id'])->update($updatePost);
    }

    public function destroy(int $id): bool
    {
        return $this->model->query()->findOrFail($id)->delete();
    }
}
