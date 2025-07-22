<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscribeRequest;
use App\Services\SubscriptionService;
use Illuminate\Http\JsonResponse;

final class SubscriptionController extends Controller
{
    public function __construct
    (
        protected SubscriptionService $subscriptionService
    ) {}

    public function index(): JsonResponse
    {
        return response()->json($this->subscriptionService->getList());
    }

    public function store(SubscribeRequest $request): JsonResponse
    {
        $newSubscription = $this->subscriptionService->store($request->validated());

        return response()->json($newSubscription);
    }
}
