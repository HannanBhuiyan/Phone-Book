<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users =  User::where('id' , '!=' , Auth::id() )->get();
        return view('backend.user.index', compact('users'));
    }

    // Admin Role Change
    public function admin_role_change(Request $request, $id)
    {
        User::findOrFail($id)->update(['role' => 1]);
        return redirect()->route('user.index')->with('success', 'Role Change Success');
    }

    // User Role Change
    public function user_role_change(Request $request, $id)
    {
        User::findOrFail($id)->update(['role' => 2]);
        return redirect()->route('user.index')->with('success', 'Role Change Success');
    }

    // Active user
    public function user_active($id)
    {
        User::findOrFail($id)->update(['active' => 1]);
        return redirect()->route('user.index')->with('success', 'User Active Success');
    }

    // Active user
    public function user_banned($id)
    {
        User::findOrFail($id)->update(['active' => 0]);
        return redirect()->route('user.index')->with('success', 'User Banner Success');
    }
}
