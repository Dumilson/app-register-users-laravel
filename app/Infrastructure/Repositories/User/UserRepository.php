<?php

namespace App\Infrastructure\Repositories\User;

use App\Domain\User\User;
use App\Domain\User\UserRepositoryInterface as UserUserRepositoryInterface;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserUserRepositoryInterface
{

    public function save(User $user): void
    {
        $userId = DB::table('users')->insertGetId([
            'name' => $user->getName(),
            'password' => $user->getPassword(),
            'email' => $user->getEmail(),
        ]);
        $user->setId($userId);
    }

    public function getAll(): array
    {
        $userData = DB::table('users')->get();

        $users = [];

        foreach ($userData as $user) {
            $users[] = new User($user->name, $user->email,null,  $user->id);
        }

        return $users;
    }

    public function delete(int $id): bool
    {
        return   DB::table('users')->where('id', $id)->delete();
    }
}
