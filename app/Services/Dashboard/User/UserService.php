<?php
// App\Services\UserService.php

namespace App\Services\Dashboard\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceInterface
{
    public function getAllUsers()
    {
        return User::paginate(3);
    }

    public function createUser(array $attributes): void
    {
        $attributes['password'] = Hash::make($attributes['password']);
        User::create($attributes);
    }

    public function updateUser(User $user, array $attributes): void
    {
        $user->update($attributes);
    }

    public function deleteUser(User $user): void
    {
        $user->delete();
    }
}
