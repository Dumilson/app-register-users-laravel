<?php

namespace App\Http\Controllers\Auth;

use App\Application\Services\Auth\AuthService;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\AuthRequest;

class AuthController extends Controller
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    public function index()
    {
        return view('auth.login');
    }

    public function logOut()
    {
        $this->authService->logout();
        return  redirect()->route('login');
    }

    public function auth(AuthRequest $authRequest)
    {
        $creds = $authRequest->only('email', 'password');
        $auth = $this->authService->login($creds);
        if ($auth) {
            return  redirect()->route('users.index');
        }
        return redirect()->back()->with("error", "Credencias invalidas");
    }
}
