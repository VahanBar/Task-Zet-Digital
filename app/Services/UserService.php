<?php

namespace App\Services;

use App\Contracts\UserServiceInterface;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

final class UserService implements UserServiceInterface
{
    public function __construct(protected UserRepository $userRepository)
    {}
    public function getList(): Collection
    {
        return $this->userRepository->getList();
    }

    public function store(array $newUser): User
    {
        return $this->userRepository->store($newUser);
    }

    public function show(int $id): User
    {
        return $this->userRepository->show($id);
    }

    public function update(array $userUpdate): bool
    {
        $userUpdate = [
            'id' => $userUpdate['id'],
            'name' => $userUpdate['name'] ?? null,
            'email' => $userUpdate['email'] ?? null,
            'password' => Hash::make($userUpdate['password']) ?? null,
        ];

        return $this->userRepository->update($userUpdate);
    }

    public function destroy(int $id): bool
    {
        return $this->userRepository->destroy($id);
    }
}
