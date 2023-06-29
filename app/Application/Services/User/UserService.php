<?php
namespace App\Application\Services\User;

use App\Domain\User\User;
use UserRepositoryInterface;

class UserService{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function createUser(string $name, string $email, string $password): User
    {
        $user = new User($name, $email, $password);

        $this->userRepository->save($user);

        return $user;
    }


    public function deleteUser(int $userId): bool
    {
        return $this->userRepository->delete($userId);
    }

    public function getAll(): array {
        return $this->userRepository->getAll();
    }
}
