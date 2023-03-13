<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.register.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->check()) {
            return redirect()->route('home');
        }

        $messages = [
            'name.required' => 'Поле имя обязательно для заполнения',
            'name.string' => 'Поле имя должно быть строкой',
            'name.max' => 'Поле имя должно быть не больше 255 символов',
            'name.min' => 'Поле имя должно быть не меньше 3 символов',
            'name.regex' => 'Поле имя должно содержать только буквы',
            'name.alpha_dash' => 'Поле имя должно содержать только буквы',
            'surname.required' => 'Поле фамилия обязательно для заполнения',
            'surname.string' => 'Поле фамилия должно быть строкой',
            'surname.max' => 'Поле фамилия должно быть не больше 255 символов',
            'surname.min' => 'Поле фамилия должно быть не меньше 3 символов',
            'surname.regex' => 'Поле фамилия должно содержать только буквы',
            'surname.alpha_dash' => 'Поле фамилия должно содержать только буквы',
            'patronymic.string' => 'Поле отчество должно быть строкой',
            'patronymic.max' => 'Поле отчество должно быть не больше 255 символов',
            'patronymic.min' => 'Поле отчество должно быть не меньше 3 символов',
            'patronymic.regex' => 'Поле отчество должно содержать только буквы',
            'patronymic.alpha_dash' => 'Поле отчество должно содержать только буквы',
            'login.required' => 'Поле логин обязательно для заполнения',
            'login.string' => 'Поле логин должно быть строкой',
            'login.max' => 'Поле логин должно быть не больше 16 символов',
            'login.min' => 'Поле логин должно быть не меньше 3 символов',
            'login.unique' => 'Пользователь с таким логин уже существует',
            'login.regex' => 'Поле логин должно содержать только буквы и цифры',
            'login.alpha_num' => 'Поле логин должно содержать только буквы и цифры',
            'email.required' => 'Поле email обязательно для заполнения',
            'email.string' => 'Поле email должно быть строкой',
            'email.email' => 'Поле email должно быть email адресом',
            'email.max' => 'Поле email должно быть не больше 255 символов',
            'email.unique' => 'Пользователь с таким email уже существует',
            'password.required' => 'Поле пароль обязательно для заполнения',
            'password.string' => 'Поле пароль должно быть строкой',
            'password.min' => 'Поле пароль должно быть не меньше 8 символов',
            'password.max' => 'Поле пароль должно быть не больше 128 символов',
            'password.confirmed' => 'Пароли не совпадают',
            'password.regex' => 'Пароль должен содержать хотя бы одну заглавную букву, одну строчную букву и одну цифру',
            'password_confirmation.required' => 'Поле подтверждение пароля обязательно для заполнения',
            'password_confirmation.string' => 'Поле подтверждение пароля должно быть строкой',
            'password_confirmation.min' => 'Поле подтверждение пароля должно быть не меньше 8 символов',
            'password_confirmation.same' => 'Пароли не совпадают',
            'password_confirmation.regex' => 'Пароль должен содержать хотя бы одну заглавную букву, одну строчную букву и одну цифру',
            'rules.required' => 'Вы должны принять правила сайта',
            'rules.boolean' => 'Вы должны принять правила сайта',
            'rules.accepted' => 'Вы должны принять правила сайта',
        ];
        
        $validationFields = $request->validate([
            'name' => ["required", "string", "max:255", "min:3", "regex:/^[a-zA-Zа-яА-Я]+$/", "alpha_dash"],
            'surname' => ["required", "string", "max:255", "min:3", "regex:/^[a-zA-Zа-яА-Я]+$/", "alpha_dash"],
            'patronymic' => ["nullable", "string", "max:255", "min:3", "regex:/^[a-zA-Zа-яА-Я]+$/", "alpha_dash"],
            'role_id' => ["nullable", "integer", "exists:roles,id"],
            'login' => ["required", "string", "max:16", "min:3", "regex:/^[a-zA-Z0-9]+$/", "alpha_num", "unique:users"],
            'email' => ["required", "string", "email", "max:255", "unique:users"],
            'password' => ["required", "string", "min:8", "max:128", "confirmed", "regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/"],
            'password_confirmation' => ["required", "string", "min:8", "same:password", "regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/"],
            'rules' => ["accepted"],
        ], $messages);

        if ($validationFields['rules']) {
            $validationFields['rules'] = 1;
        }

        $validationFields['role_id'] = 2;

        $user = User::create($validationFields);

        if ($user) {
            $request->session()->forget('login');
            $request->session()->put('login', $request->input('login'));
            return redirect()->route('login');
        }

        return back()->withErrors([
            'login' => 'Логин уже занят',
            'email' => 'Email уже занят',
            'rules' => 'Вы должны принять правила сайта',
            'password_confirmation' => 'Пароли не совпадают',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
