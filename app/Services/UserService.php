<?php

declare(strict_types=1);

namespace App\Services;

use App\Interfaces\UserRepositoryInterface;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers(): iterable
    {
        return $this->userRepository->all();
    }

    public function getUserById(int $id): object
    {
        return $this->userRepository->find($id);
    }

    public function createUser(array $data): object
    {
        return $this->userRepository->create($data);
    }

    public function updateUser(int $id, array $data): bool
    {
        $user = $this->userRepository->find($id);
        return $this->userRepository->update($user, $data);
    }

    public function deleteUser(int $id): bool
    {
        $user = $this->userRepository->find($id);
        return $this->userRepository->delete($user);
    }

    public function getUsersWithPosts(): iterable
    {
        return $this->userRepository->getUsersWithPosts();
    }

    public function getJoinsUsersWithPosts(): iterable
    {
        return $this->userRepository->getJoinsUsersWithPosts();
    }
}
