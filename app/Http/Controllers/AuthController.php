<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;



class AuthController extends Controller
{
    public function LoginForm()
    {
        return view('auth.login');
    }
    public function SignUpForm()
    {
        return view('auth.register');
    }
    public function ValidateLogin(Request $req)
    {
        $credentials = $req->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $req->session()->regenerate();
            return redirect()->intended('quotes');
        }
        return back()->withErrors([
            'Credentials' => 'Something went wrong !'
        ]);
    }
    public function ValidateSignUp(Request $req)
    {
        $username = $req->input('username');
        $email = $req->input('email');
        $password = $req->input('password');

        $user = User::create([
            'name' => $username,
            'email' => $email,
            'password' =>  Hash::make($password)
        ]);
        if ($user) {
            Auth::login($user);
        } else {
            return back()->withErrors(['error' => 'Something went wrong !']);
        }
        return redirect()->intended('quotes');
    }
}
