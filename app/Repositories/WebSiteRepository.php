<?php

namespace App\Repositories;

use App\Models\WebSite;
use Illuminate\Database\Eloquent\Collection;

final class WebSiteRepository
{
    protected WebSite $model;

    public function __construct(WebSite $model)
    {
        $this->model = $model;
    }

    public function getList(): Collection
    {
        return $this->model->all();
    }

    public function store(array $newWebSite): WebSite
    {
        return $this->model->query()->create($newWebSite);
    }

    public function show(int $id): WebSite
    {
        return $this->model->query()->findOrFail($id);
    }

    public function update(int $id, array $newWebSite): bool
    {
        return $this->model->query()->findOrFail($id)->update($newWebSite);
    }

    public function destroy(int $id): bool
    {
        return $this->model->query()->findOrFail($id)->delete();
    }
}
