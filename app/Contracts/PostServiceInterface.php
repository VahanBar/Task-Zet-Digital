<?php

namespace App\Contracts;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

interface PostServiceInterface
{
    public function getList(): Collection;

    public function store(array $newPost): Post;

    public function show(int $id): Post;

    public function update(array $postUpdate): bool;

    public function destroy(int $id): bool;

}
