<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request){
        //dd($request);

        $erro = $request->get('erro');
        return view('site.login',[
            'titulo'=>'login',
            'erro'=> $erro
        ]);
    }

    public function autenticar(Request $request){
        //regras de validação
        $regras = [
            'usuario'=>'email',
            'senha'=>'required'
        ];
        $feedback = [
            'usuario.email'=>'O campo usuário (email) precisa ser válido',
            'senha.required'=> 'O campo senha é obrigatório'
        ];

        //se negado, a rota antiga é requisitada
        $request->validate($regras, $feedback);

        //dd($request);

        $email = $request->get('usuario');
        $password = $request->get('senha');

        //iniciar o model user
        $user = new User;
        $usuario = $user->where('email', $email)->where('password',$password)->get()->first();

        //dd($usuario);

        if (isset($usuario->name)) {
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            //dd($_SESSION);
            return redirect()->route('app.home');   
        }else{
            return redirect()->route('site.login',['erro'=>1]);   
        }

        //print_r($request->all());

    }

    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
