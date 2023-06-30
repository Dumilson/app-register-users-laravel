<?php
namespace App\Application\Services\Auth;

use Illuminate\Support\Facades\Auth;

  Class AuthService {
    public function login(array $credentials): bool
    {
        return Auth::attempt($credentials);
    }

    public function logout(): void
    {
        Auth::logout();
    }
 }
