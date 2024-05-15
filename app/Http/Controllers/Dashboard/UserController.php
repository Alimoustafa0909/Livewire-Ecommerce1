<?php

// App\Http\Controllers\Dashboard\UserController.php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\Dashboard\User\UserServiceInterface;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAllUsers();
        return view('dashboard.users.index', compact('users'));
    }

    public function store(UserRequest $request)
    {
        $this->userService->createUser($request->validated());
        return redirect()->route('dashboard.users.index')->with('success_message', 'The user has been created successfully');
    }

    public function create()
    {
        return view('dashboard.users.create');
    }

    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        $this->userService->updateUser($user, $request->validated());
        return redirect()->route('dashboard.users.index')->with('success_message', 'The user has been updated successfully');
    }

    public function show(User $user)
    {
        return view('dashboard.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        $this->userService->deleteUser($user);
        return redirect()->route('dashboard.users.index')->with('success_message', 'The user has been deleted successfully');
    }
}
