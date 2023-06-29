<?php

namespace App\Http\Controllers\User;

use App\Application\Services\Phone\PhoneService;
use App\Application\Services\User\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use Illuminate\Http\Request;


class UserController extends Controller
{
    private $userService;
    private $phoneService;

    public function __construct(UserService $userService, PhoneService $phoneService)
    {
        $this->userService = $userService;
        $this->phoneService = $phoneService;
    }
    public function index()
    {
        $users = $this->userService->getAll();
        $phones =  $this->phoneService;
        return view('users.index', compact('users','phones'));
    }

    public function store(CreateUserRequest $createUserRequest)
    {
        try {
            $name = $createUserRequest->name;
            $password = $createUserRequest->password;
            $email = $createUserRequest->email;
            $phone = $createUserRequest->phone;

            $userSave = $this->userService->createUser($name, $email, $password);
            $this->phoneService->createPhone($phone, $userSave->getId());

            return redirect()->back()->with('success', "Usuario Salvo");
        } catch (\Exception $e) {

            return redirect()->back()->with('error', "Ocorrou um erro interno");
        }
    }
}
