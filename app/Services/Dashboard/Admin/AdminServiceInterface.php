<?php
namespace App\Services\Dashboard\Admin;

use App\Models\Admin;

interface AdminServiceInterface
{
    public function getAllAdmins();
    public function createAdmin(array $attributes): void;
    public function updateAdmin(Admin $admin, array $attributes): void;
    public function deleteAdmin(Admin $admin): void;
}
