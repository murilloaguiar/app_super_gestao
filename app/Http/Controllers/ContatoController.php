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
        $request->validate(SiteContato::rules(), SiteContato::feedback());//quais campos serão validados e quais serão as validações. As chaves são os names dos inputs
           
        SiteContato::create($request->all()); //inserção dos dados

        return redirect()->route('site.index');
    }

}
