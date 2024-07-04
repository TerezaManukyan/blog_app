<?php

namespace App\Http\Controllers;

use App\Http\Repository\User\IUserRepository;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    protected IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $userData = $request->validated();

        if ($this->userRepository->getUserByEmail($userData['email'])) {
            throw ValidationException::withMessages([
                'email' => 'The email address has already been taken.',
            ]);
        }

        $this->userRepository->create($userData);

        return view('auth.login')->with(['successMessage' => 'You registered a user, Now you can login']);
    }
}
