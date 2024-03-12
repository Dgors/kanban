<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\Auth\RegisterRequest;
use App\Providers\RouteServiceProvider;

class RegisterController extends Controller
{
    public function create() {
        return view('auth/register');
    }

    public function store(RegisterRequest $request) {
        $request->validated();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            ]);

        Auth::login($user);

        return redirect('/');
    }
}
