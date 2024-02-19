<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('users.register');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        Auth::login($user);

        return redirect('/billets');
    }


    public function showLoginForm()
    {
        return view('users.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/billets');
        }

        return back()->withErrors([
            'email' => 'mot de passe ou email incorrect.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
