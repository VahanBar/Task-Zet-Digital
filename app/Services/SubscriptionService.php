<?php

namespace App\Services;

use App\Models\Subscription;
use App\Repositories\SubscriptionRepository;
use Illuminate\Database\Eloquent\Collection;

final class SubscriptionService
{
    public function __construct(
        protected SubscriptionRepository $subscriptionRepository
    ) {}

    public function getList(): Collection
    {
        return $this->subscriptionRepository->getList();
    }

    public function store(array $newSubscription): Subscription
    {
        return $this->subscriptionRepository->store($newSubscription);
    }
}
