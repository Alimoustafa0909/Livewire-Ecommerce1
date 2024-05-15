<?php
// App\Services\UserServiceInterface.php

namespace App\Services\Dashboard\User;

use App\Models\User;

interface UserServiceInterface
{
    public function getAllUsers();
    public function createUser(array $attributes): void;
    public function updateUser(User $user, array $attributes): void;
    public function deleteUser(User $user): void;
}
