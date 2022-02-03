<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request){
        /*
        echo '<pre>';
            print_r($request->all()); //recupera o array de parâmetros enviados na request
        echo '</pre>';
        
        //imprimindo valores específicos
        echo $request->input('nome');
        echo $request->input('email');

        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');

        echo '<pre>';
            print_r($contato->getAttributes()); 
        echo '</pre>';

        $contato->save();*/

        //$contato = new SiteContato();
        //$contato->fill($request->all()); //preenche os atributos do objeto com base no array associativo. É preciso definir a variável fillable no modelo
        //$contato->create($request->all()); //cria diretamente um objeto baseado num array associativo.É preciso definir a variável fillable no modelo 
        //$contato->save();


        /*$motivos_contatos = [
            '1'=>'Dúvida',
            '2' => 'Elogio',
            '3' => 'Reclamação'
         ];*/

        $motivos_contatos = MotivoContato::all();

        return view('site.contato',[
            'titulo'=>'Contato (teste)',
            'motivo_contatos'=>$motivos_contatos
        ]);
    }

    public function salvar(Request $request){
        //name dos inputs
        $request->validate([
                'nome'=> 'required|min:3|max:40:unique:site_contatos', //nomes com no mínimo 3 caracteres e no máximo 40 e únicos.
                'telefone'=> 'required',
                'email'=> 'email',//verifica se fornece um dado de email válido
                'motivo_contatos_id'=> 'required',
                'mensagem'=> 'required|max:500'
            ],
            [
                //customizando as mensagens de feedback
                'nome.min' => 'O campo nome precisa ter pelo menos 3 caracteres',
                'nome.max' => 'O campo nome precisa ter menos de 40 caracteres',
                'nome.unique' => 'Este nome já existe',

                'email.email' => 'Digite um email válido',

                'mensagem.max' => 'O campo mensagem precisa ter menos de 500 caracteres',
                
                'required'=> 'O campo :attribute acima precisa ser preenchido' //mensagem default para a validação, attribute recupera o campo em que esta sendo aplicada a validação
            ]
        );//quais campos serão validados e quais serão as validações. As chaves são os names dos inputs
           
        SiteContato::create($request->all()); //inserção dos dados

        return redirect()->route('site.index');
    }

}
