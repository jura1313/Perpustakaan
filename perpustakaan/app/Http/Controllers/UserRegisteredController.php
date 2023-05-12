<?php

namespace App\Http\Controllers;

use App\Models\c;
use App\Models\User;
use App\Models\Category;
use App\Models\BookStore;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserRegisteredController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }


    public function store(Request $request) {

        // dd($request);

       $request->validate([
            'username' => ['required'],
            'fullname' => ['required'],
            'email' => ['required'],
            'password' => ['required','confirmed'],
            'role',
        ]);

        $register = User::create([
            "username"=> $request->username,
            "fullname"=> $request->fullname,
            "email"=> $request->email,
            "password"=> Hash::make($request->password),
            "role"=> $request->role,
        ]);

        Auth::login($register);

        if(Auth::check()) {
            return redirect('home')->with('status_create', 'Berhasil Register!');

        }
            return redirect('registrasi')->with('status_delete', 'Gagal Register!');

    }

    public function login()
    {
        return view('auth.login');
    }

    public function verified(Request $request) {

        Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if(Auth::check()) {
            return redirect('home')->with('status_create', 'Berhasil login!');

        }
            return redirect('login')->with('status_delete', 'Gagal login!');
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login')->with('status_create', 'Anda telah logout!');
    }

    public function all_user(){

        if(auth()->user()->role == 'staff') {
            $users = User::Where('role','member')->get();

            return view('dashboard.users.show', ['users' => $users]);
            }

        if(auth()->user()->role == 'admin') {
            $users = User::all();

            return view('dashboard.users.show', ['users' => $users]);
            }

    }
}
