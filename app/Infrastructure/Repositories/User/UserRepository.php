<?php

namespace App\Infrastructure\Repositories\User;

use App\Domain\User\User;
use Illuminate\Support\Facades\DB;
use UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{

    public function save(User $user): void
    {
        $userId = DB::table('users')->insertGetId([
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'email' => $user->getEmail(),
        ]);
        $user->setId($userId);
    }

    public function getAll(): array
    {
        $userData = DB::table('users')->get();

        $users = [];

        foreach ($userData as $user) {
            $users[] = new User($user->name, $user->email);
        }

        return $users;
    }

    public function delete(int $id): bool
    {
        return   DB::table('users')->find($id)->delete();
    }
}
