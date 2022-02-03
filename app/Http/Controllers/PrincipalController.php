<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MotivoContato;

class PrincipalController extends Controller
{
    public function principal(){
        /*$motivos_contatos = [
            '1'=>'Dúvida',
            '2' => 'Elogio',
            '3' => 'Reclamação'
         ];*/

        $motivos_contatos = MotivoContato::all();
        //dd($motivos_contatos);
        return view('site.principal',[
            'motivo_contatos'=>$motivos_contatos
        ]);
    }
}
