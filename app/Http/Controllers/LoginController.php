<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = $request->get('erro');
        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }
    public function autenticar(Request $request)
    {
        $regras = [
            'usuario' => 'required|email',
            'senha' => 'required'
        ];

        $mensagens = [
            'required' => 'O Campo :attribute deve ser preenchido!'
        ];

        $request->validate($regras, $mensagens);

        $email = $request->get('usuario');
        $password = $request->get('senha');

        $user = new User();
        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();

        if(isset($usuario->name)) {
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }

        // echo "<pre>";
        // print_r($usuario);
        // echo "</pre>";

        // return redirect()->route('site.index');
    }

    public function sair()
    {
        session_destroy();
        return redirect()->route('site.index');
    }
}
