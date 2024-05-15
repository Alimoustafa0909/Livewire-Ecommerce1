<?php
namespace App\Services\Dashboard\Admin;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminService implements AdminServiceInterface
{
    public function getAllAdmins()
    {
        return Admin::all();
    }

    public function createAdmin(array $attributes): void
    {
        $attributes['password'] = Hash::make($attributes['phone']);
        Admin::create($attributes);
    }

    public function updateAdmin(Admin $admin, array $attributes): void
    {
        $admin->update($attributes);
    }

    public function deleteAdmin(Admin $admin): void
    {
        $admin->delete();
    }
}
