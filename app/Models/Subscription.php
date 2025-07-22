<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Notifications\Notifiable;

final class Subscription extends Pivot
{
    use HasFactory, Notifiable;

    protected $table = 'subscriptions';

    protected $fillable = [
        'user_id',
        'website_id'
    ];
}
