<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\Models\User;

interface UserRepositoryInterface
{
    public function all(): iterable;
    public function find(int $id): object;
    public function create(array $data): object;
    public function update(object $user, array $data): bool;
    public function delete(object $user): bool;
    public function getUsersWithPosts(): iterable;
    public function getJoinsUsersWithPosts(): iterable;
}
