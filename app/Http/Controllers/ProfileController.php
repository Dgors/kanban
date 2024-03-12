<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show(Request $request) {
        dump($request->user()); //Доступ к аутентифицированному пользователю
        dump(Auth::check()); //Проверка на аутентификацию
        //$request->session()->regenerate();
        dump($request->session()); //
        dump($request->input());
        //Auth::logout();
        dump(curl_init('mail.ru'));
        return view('profile.forms.restore-user-form');
    }

    public function create(Request $request) {
        dump($request->user());
        return view('dashboards');

    }

    public function destroy(Request $request)
    {
        $validate = $request->validate([
            'password' => ['required', 'current_password']
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function restore(Request $request)
    {
        $validate = $request->validate([
           'email' => ['required', ],
            'password' => ['required', ],
        ]);

        $pass = $request->password;
        $mail = User::withTrashed()->where('email', $request->email)->first();

        if (Hash::check($pass, $mail->password))
        {
            User::withTrashed()->find($mail->id)->restore();

            Auth::attempt($validate);
            $request->session()->regenerate(); //повторная генерация сессии
            return redirect()->intended('dashboard');
        }

        return back()->withErrors(['alert' => 'Пользователь не найден']);

        //dump($validate);


    }

}
