<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

final readonly class UserRepository
{
    protected User $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getList(): Collection
    {
        return $this->model->all();
    }

    public function store(array $data): User
    {
        $newUser = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ];

        return $this->model->query()->create($newUser);
    }

    public function show(int $id): User
    {
        return $this->model->query()->findOrFail($id);
    }

    public function update(array $userUpdate): bool
    {
        return $this->model->query()->findOrFail($userUpdate['id'])->update($userUpdate);
    }

    public function destroy(int $id): bool
    {
        return $this->model->query()->findOrFail($id)->delete();
    }
}
