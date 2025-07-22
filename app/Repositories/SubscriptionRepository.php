<?php

namespace App\Repositories;

use App\Models\Subscription;
use Illuminate\Database\Eloquent\Collection;

final class SubscriptionRepository
{
    protected Subscription $model;

    public function __construct(Subscription $model)
    {
        $this->model = $model;
    }

    public function getList(): Collection
    {
        return $this->model->all();
    }

    public function store(array $newSubscription): Subscription
    {
        return $this->model->query()->create($newSubscription);
    }
}
