<?php

namespace App\Http\Repository\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements IUserRepository
{
    public function create(array $data)
    {
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);

        $user->save();
        return $user;
    }

    public function getUserByEmail(string $email)
    {
        return User::where('email', $email)->exists();
    }
}
