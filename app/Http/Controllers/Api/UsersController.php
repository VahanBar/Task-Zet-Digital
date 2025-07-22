<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

final class UsersController extends Controller
{
    public function __construct(
        protected UserService $userService
    ) {}

    public function index(): JsonResponse
    {
        return response()->json($this->userService->getList());
    }

    public function store(UserStoreRequest $request): JsonResponse
    {
        $newUser = $this->userService->store($request->validated());

        return response()->json($newUser);
    }

    public function show($id): JsonResponse
    {
        $userData = $this->userService->show($id);

        return response()->json($userData);
    }

    public function update(UserUpdateRequest $request): JsonResponse
    {
        $userUpdate = $this->userService->update($request->validated());

        return response()->json($userUpdate); // helpers !!
    }

    public function destroy($id): bool
    {
        return $this->userService->destroy($id);
    }
}
