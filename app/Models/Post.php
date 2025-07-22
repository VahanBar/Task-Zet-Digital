<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function website(): BelongsTo
    {
        return $this->belongsTo(Website::class, 'id');
    }

    public function postUsers(): HasMany
    {
        return $this->hasMany(PostUser::class);
    }
}
