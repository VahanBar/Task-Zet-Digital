<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

final class Post extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'posts';

    protected $fillable = [
        'id',
        'title',
        'body'
    ];

//    public function likedByUsers(): BelongsToMany
//    {
//        return $this->belongsToMany(User::class, 'post_user');
//    }

    public function website(): BelongsTo
    {
        return $this->belongsTo(Website::class, 'id');
    }

//    public function postUser(): BelongsToMany
//    {
//        return $this->belongsToMany(PostUser::class, 'post_user', 'post_id', 'user_id');
//    }

    public function postUsers(): HasMany
    {
        return $this->hasMany(PostUser::class);
    }


}
