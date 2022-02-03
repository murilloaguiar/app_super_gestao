<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste(int $x, int $y){
        //echo " A soma de $p1 e $p2 é: ".($p1+$p2);
        /*return view('site.teste', [
            'p1'=>$p1,
            'p2'=>$p2
        ]);*/

        /*return view('site.teste', compact('p1', 'p2')); */
        //compact cria um array associativo

        return view('site.teste')->with('x', $x)->with('y',$y);
    }
    //parâmetros vindos da rota de teste
}
