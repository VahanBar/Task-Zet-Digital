<?php

namespace App\Contracts;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

interface SubscriptionServiceInterface
{
    public function getList(): Collection;

    public function store(array $newSubscription): Post;
}
