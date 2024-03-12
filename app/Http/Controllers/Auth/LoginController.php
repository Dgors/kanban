<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function store(LoginRequest $request) {
        $validated = $request->validated(); //валидация

        if (Auth::attempt($validated, true)) { //сравнение массива ключ/значение с БД
            $request->session()->regenerate(); //повторная генерация сессии
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
           'alert' => 'Неверное имя пользователя или пароль'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function create() {
        return view('auth.login');
    }
}
