<?php

namespace App\Http\Controllers\User;

use App\Application\Services\Phone\PhoneService;
use App\Application\Services\User\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        return view('users.index', compact('users', 'phones'));
    }

    public function store(CreateUserRequest $createUserRequest)
    {
        try {
            DB::beginTransaction();
            $name = $createUserRequest->name;
            $password = Hash::make($createUserRequest->password);
            $email = $createUserRequest->email;

            $userSave = $this->userService->createUser($name, $email, $password);

            foreach ($createUserRequest->phone as $phone) {
                $this->phoneService->createPhone($phone, $userSave->getId());
            }
            DB::commit();
            return redirect()->back()->with('success', "Usuario Salvo");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', "Ocorrou um erro interno");
        }
    }

    public function destroy(int $id)
    {
        try {
            $this->userService->deleteUser($id);
            return redirect()->back()->with('success', "Usuario eliminado");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "Ocorrou um erro interno");
        }
    }
}
