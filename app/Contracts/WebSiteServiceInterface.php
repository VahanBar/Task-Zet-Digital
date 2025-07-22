<?php

namespace App\Contracts;

use App\Models\WebSite;
use Illuminate\Database\Eloquent\Collection;

interface WebSiteServiceInterface
{
    public function getList(): Collection;

    public function store(array $newWebSite): WebSite;

    public function show(int $id): WebSite;

    public function update(array $updateWebSite): bool;

    public function destroy(int $id): bool;
}
