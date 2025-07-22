<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\WebSiteStoreRequest;
use App\Http\Requests\WebSiteUpdateRequest;
use App\Services\WebSiteService;
use Illuminate\Http\JsonResponse;

final class WebStiesController extends Controller
{
    public function __construct(
        protected WebSiteService $webSiteService
    ) {}

    public function index(): JsonResponse
    {
        return response()->json($this->webSiteService->getList());
    }

    public function store(WebSiteStoreRequest $request): JsonResponse
    {
        $newWebSite = $this->webSiteService->store($request->validated());

        return response()->json($newWebSite);
    }

    public function show(int $id): JsonResponse
    {
        return response()->json($this->webSiteService->show($id));
    }

    public function update(WebSiteUpdateRequest $request): JsonResponse
    {
        $updateWebSite = $this->webSiteService->update($request->validated());

        return response()->json($updateWebSite);
    }

    public function destroy(int $id): JsonResponse
    {
        return response()->json($this->webSiteService->destroy($id));
    }
}
