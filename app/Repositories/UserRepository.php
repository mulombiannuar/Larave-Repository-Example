<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface
{
    public function all(): iterable
    {
        return DB::table('users')->get();
    }

    public function find(int $id): object
    {
        return DB::table('users')->where('id', $id)->first();
    }

    public function create(array $data): object
    {
        $id = DB::table('users')->insertGetId($data);
        return $this->find($id);
    }

    public function update(object $user, array $data): bool
    {
        return DB::table('users')->where('id', $user->id)->update($data) > 0;
    }

    public function delete(object $user): bool
    {
        return DB::table('users')->where('id', $user->id)->delete() > 0;
    }

    public function getUsersWithPosts(): iterable
    {
        return User::with('posts')->get();
    }

    public function getJoinsUsersWithPosts(): iterable
    {
        return DB::table('users')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->select('users.*', 'posts.title as post_title', 'posts.body as post_body')
            ->get();
    }
}
