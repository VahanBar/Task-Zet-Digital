<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class PostsController extends Controller
{
    public function __construct(
        protected PostService $postService
    ){}

    public function index(): JsonResponse
    {
        return response()->json($this->postService->getList());
    }

    public function store(PostStoreRequest $request): JsonResponse
    {
        $newPost = $this->postService->store($request->validated());

        return response()->json($newPost);
    }

    public function show(int $id): JsonResponse
    {
        $showPost = $this->postService->show($id);

        return response()->json($showPost);
    }

    public function update(PostUpdateRequest $request): JsonResponse
    {
        $updatePost = $this->postService->update($request->validated());

        return response()->json($updatePost);
    }

    public function destroy(int $id): JsonResponse
    {
        return response()->json($this->postService->destroy($id));
    }
}
