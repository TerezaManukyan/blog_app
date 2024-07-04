<?php

namespace App\Http\Repository\User;

interface IUserRepository
{
   public function create(array $data);

    public function getUserByEmail(string $email);

}
