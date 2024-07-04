<?php

namespace App\Http\Controllers;

use App\Http\Repository\Post\IPostRepository;
use App\Http\Repository\User\IUserRepository;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    protected IUserRepository $userRepository;
    protected IPostRepository $postRepository;

    public function __construct(IUserRepository $userRepository, IPostRepository $postRepository)
    {
        $this->userRepository = $userRepository;
        $this->postRepository = $postRepository;
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $userData = $request->validated();

        if (!Auth::attempt($userData)) {
            throw ValidationException::withMessages([
                'password' => 'Invalid Credentials',
            ]);
        } else {
            $posts = $this->postRepository->getAll('');
            return view('post.index')->with(['user' => Auth::user(), 'posts' => $posts]);
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->regenerate();
        session()->invalidate();

        return redirect()->route('loginForm');
    }
}
