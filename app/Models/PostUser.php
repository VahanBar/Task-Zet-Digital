<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

final class PostUser extends Pivot
{
    protected $table = 'post_user';

    protected $fillable = [
        'user_id',
        'post_id',
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function subscribers(): HasMany
    {
        return $this->belongsToMany(Subscription::class, 'subscriptions', 'website_id', 'user_id')
            ->withTimestamps();
    }
}
