<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginUserController extends Controller
{
    public function index()
    {
        return view('layouts.frontend.auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('homepage');
        }
        return back()->with('error', 'Invalid Credentials');
    }
    public function edit($userId)
    {
        $user = User::find($userId);
        return view('layouts.frontend.home.profileedit', compact('user'));
    }
    public function update(Request $request, $userId)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        $user = User::find($userId);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('homepage');
    }
}
