<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginStepOneRequest;
use App\Http\Requests\LoginStepTwoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login.step-one');
    }

    public function loginStepOne(LoginStepOneRequest $request)
    {
        // if login is bigger than 3 symbols error
        // if (strlen($request->input('login')) > 3) {
        //     return back()->withErrors([
        //         'login' => 'Логин должен быть не больше 3 символов'
        //     ]);
        // }

        $messages = [
            'login.required' => 'Поле логин обязательно для заполнения',
            'login.string' => 'Поле логин должно быть строкой',
            'login.max' => 'Поле логин должно быть не больше 16 символов',
            'login.min' => 'Поле логин должно быть не меньше 3 символов',
            'login.exists' => 'Пользователь с таким логином не найден',
            'login.regex' => 'Поле логин должно содержать только латинские буквы и цифры',
            'login.alpha_num' => 'Поле логин должно содержать только латинские буквы и цифры',
        ];

        $this->validate($request, [
            'login' => [
                "required", 
                "string", 
                "max:16", 
                "min:3", 
                "regex:/^[a-zA-Z0-9]+$/", 
                "alpha_num" ],
        ], $messages);
        
        $request->session()->put('login', $request->input('login'));

        return redirect()->route('login.step-two');
    }

    public function showPasswordForm()
    {
        if (!session()->has('login')) {
            return redirect()->route('login.step-one');
        }
        return view('auth.login.step-two');
    }

    public function loginStepTwo(LoginStepTwoRequest $request)
    {
        $login = $request->session()->get('login');

        $messages = [
            'password.required' => 'Поле пароль обязательно для заполнения',
            'password.string' => 'Поле пароль должно быть строкой',
            'password.max' => 'Поле пароль должно быть не больше 16 символов',
            'password.min' => 'Поле пароль должно быть не меньше 8 символов',
            'password.regex' => 'Поле пароль должно содержать только латинские буквы и цифры',
            'password.alpha_num' => 'Поле пароль должно содержать только латинские буквы и цифры',
        ];

        $this->validate($request, [
            'password' => [
                "required", 
                "string", 
                "max:128", 
                "min:3", 
                "regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/"
            ],
        ], $messages) ;

        if (Auth::attempt(['login' => $login, 'password' => $request->input('password')])) {
            // $request->session()->forget('login');

            return redirect()->route('profile');
        }

        return back()->withErrors([
            'password' => 'Неверный пароль или логин'
        ]);
    }

}
