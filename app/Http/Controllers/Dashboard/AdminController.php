<?php

// App\Http\Controllers\Dashboard\Admins\AdminController.php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Services\Dashboard\Admin\AdminServiceInterface;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $adminService;

    public function __construct(AdminServiceInterface $adminService)
    {
        $this->adminService = $adminService;
    }

    public function index()
    {
        $admins = $this->adminService->getAllAdmins();
        return view('dashboard.admins.index', compact('admins'));
    }

    public function show(Admin $admin)
    {
        return view('dashboard.admins.show', compact('admin'));
    }

    public function edit(Admin $admin)
    {
        return view('dashboard.admins.edit', compact('admin'));
    }

    public function store(Request $request)
    {
        $this->adminService->createAdmin($request->validated());
        return redirect()->route('dashboard.admins.index')->with('success_message', 'The new admin has been added successfully');
    }

    public function create()
    {
        return view('dashboard.admins.create');
    }

    public function update(Admin $admin, Request $request)
    {
        $this->adminService->updateAdmin($admin, $request->validated());
        return redirect()->route('dashboard.admins.index')->with('success_message', 'The admin has been updated successfully');
    }

    public function destroy(Admin $admin)
    {
        $this->adminService->deleteAdmin($admin);
        return redirect()->route('dashboard.admins.index')->with('success_message', 'The admin has been deleted successfully');
    }

    public function logout()
    {
        // Implement logout logic here
    }
}
