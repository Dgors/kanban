<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
Use App\Http\Controllers\MailReader;
use App\Models\New_ticket;
use App\Models\Dashboard_column;

class ProfileController extends Controller
{
    public function show(Request $request) {
        //dump($request->user()); //Доступ к аутентифицированному пользователю
        //dump(Auth::check()); //Проверка на аутентификацию
        //$request->session()->regenerate();
        //dump($request->session()); //
       // dump($request->input());
        //Auth::logout();
       // dump(curl_init('mail.ru'));
        $mail = new MailReader;
        dump($mail->mail());
        return view('profile.forms.restore-user-form');

    }

    public function create(Request $request) {
        //dump($request->user());
        $tickets = New_ticket::select('text_subject', 'created_at')->get();
        //dump($tickets);
        $column_names = Dashboard_column::select('column_name')->get();

        return view('layouts.dashboard', ['tickets' => $tickets, 'column_names' => $column_names]);

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
