<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function user_view()
    {
        $users = User::all();
        $roles = Role::all();
        return view('users.index', compact('users','roles'));
    }

    public function create_user(Request $request)
    {
        try {
            $users = User::create($request->except(['_token','roles']));

            $users->roles()->sync($request->roles);
            return redirect()->back()->with('toast_success', 'User Created Successfully!');
        }catch (\Exception $exception){
            dd($exception->getMessage());
        }
    }
}
