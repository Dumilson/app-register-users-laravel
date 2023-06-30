<?php
namespace App\Domain\User;

use App\Domain\User\User;

interface UserRepositoryInterface {
    public function save(User $user): void;
    public function delete(int $user): bool;
    public function getAll(): array;
}
