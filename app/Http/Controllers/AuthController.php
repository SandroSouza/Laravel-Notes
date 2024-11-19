<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function LoginSubmit(Request $request){


        // form validation
        $request->validate(
            //rules
            [
                'text_username' => 'required|email',
                'text_password' => 'required|min:6|max:16'
            ], 
            // errors messages
            [
                'text_username.required' => 'O email é obrigatório',
                'text_username.email' => 'O email deve ser um email valido',
                'text_password.required' => 'A senha é obrigatória',
                'text_password.min' => 'A senha deve ter pelo menos :min caracteres',
                'text_password.max' => 'A senha deve ter no máximo :max caracteres'
            ]
        );

        // get user input
        $email = $request->input('text_username');
        $password = $request->input('text_password');

        //check if user exists
        $user = User::where('email', $email)->where('deleted_at', NULL)->first();

        if(!$user){
            return redirect()->back()->withInput()->with('loginError', 'Email ou Senha estão incorretos');

        }

        // check if passowrd is correct
        if(!password_verify($password, $user->password)){
            return redirect()->back()->withInput()->with('loginError', 'Email ou Senha estão incorretos');

        }

        //update last login
        $user->last_login = date('Y-m-d H:i:s');
        $user->save();

        // login user
        session([
            'user' => $user->id,
            'email' => $user->email
        ]);

        echo 'Login com sucesso';

    }

    public function logout(){
        //logout from the application
        session()->forget('user');
        return redirect()->to('/login');
    }
}
