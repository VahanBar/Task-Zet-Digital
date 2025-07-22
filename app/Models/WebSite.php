<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class WebSite extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'url'];

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }

    public function subscribers(): HasMany
    {
        return $this->belongsToMany(User::class, 'subscriptions', 'website_id', 'user_id')
            ->withTimestamps();
    }


}
