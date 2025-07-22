<?php

namespace App\Services;

use App\Models\WebSite;
use App\Repositories\WebSiteRepository;
use Illuminate\Database\Eloquent\Collection;

final class WebSiteService
{
    public function __construct(
        protected WebSiteRepository $webSiteRepository
    ) {}

    public function getList(): Collection
    {
        return $this->webSiteRepository->getList();
    }

    public function store(array $data): WebSite
    {
        $newWebSite = [
            'name' => $data['name'],
            'url' => $data['url'],
        ];

        return $this->webSiteRepository->store($newWebSite);
    }

    public function show(int $id): WebSite
    {
        return $this->webSiteRepository->show($id);
    }

    public function update(array $updateWebSite): bool
    {
        $updateWebSite = [
            'name' => $updateWebSite['name'],
            'url' => $updateWebSite['url'],
        ];

        $id = $updateWebSite['id'];

        return $this->webSiteRepository->update($id, $updateWebSite);
    }

    public function destroy(int $id): bool
    {
        return $this->webSiteRepository->destroy($id);
    }
}
