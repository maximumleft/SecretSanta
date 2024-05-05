<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\User;

class SantaController extends Controller
{
    public function getUsersList()
    {
        $users = User::all();
        $isResults = Result::query()->exists();
        $results = Result::all();
        return view('Users.users', compact('users','results','isResults'));
    }

    public function addUserToContest(User $user)
    {
        $this->service->addUserToContest($user);
        return redirect()->route('users.list');
    }

    public function deleteUserFromContest(User $user)
    {
        $this->service->deleteUserFromContest($user);
        return redirect()->route('users.list');
    }

    public function logOut()
    {
        auth()->logout();
        return redirect()->to('/login');
    }

    public function mixingUsers()
    {
        $this->service->mixingUsers();
        return redirect()->route('users.list');
    }
}
