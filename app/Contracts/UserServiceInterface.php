<?php

namespace App\Contracts;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserServiceInterface
{
    public function getList(): Collection;

    public function store(array $newUser): User;

    public function update(array $userUpdate): bool;

    public function destroy(int $id): bool;

    public function show(int $id): User;
}
