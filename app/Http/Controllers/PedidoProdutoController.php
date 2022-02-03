<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Produto;
use App\PedidoProduto;


class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pedido $pedido)
    {
        $produtos = Produto::all();
        $pedido->produtos;//eager loading, objeto já está instanciado. Chamando os métodos do relacionamento
        return view('app.pedido_produto.create', [
            'pedido' => $pedido,
            'produtos'=>$produtos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {
        /*echo '<pre>';
            print_r($pedido);
        echo '</pre>';
        echo '<hr>';
        echo '<pre>';
            print_r($request);
        echo '</pre>';*/

        $regras = [
            'produtos_id'=>'exists:produtos,id',
            'quantidade'=>'required'
        ];

        $feedback = [
            'produtos_id.exists' => 'O produto informado não existe',
            'required'=>'O campo :attribute deve ser preenchido'
        ];

        $request->validate($regras, $feedback);

        echo 'pedido '.($pedido->id).'- produto '.$request->get('produto_id');

        /*$pedidoProduto = new PedidoProduto();
        $pedidoProduto->pedido_id = $pedido->id;
        $pedidoProduto->produto_id = $request->get('produto_id');
        $pedidoProduto->quantidade = $request->get('quantidade');
        $pedidoProduto->save();*/

        //$pedido->produtos; //retorna a relação dos registros entre pedidos e produtos

        $pedido->produtos()->attach(
            $request->get('produto_id'), 
            [
                'quantidade'=>$request->get('quantidade')
            ]
        ); 
        //retorna um objeto que mapeia o relacionamento. Permite adicionar as informações que devem ser inseridas na tabela que guardas as informações do relacionamento

        /*$pedido->produtos()->attach([
            $request->get('produto_id') => ['quantidade'=>$request->get('quantidade')],
            $request->get('produto_id') => ['quantidade'=>$request->get('quantidade')],
            $request->get('produto_id') => ['quantidade'=>$request->get('quantidade')]
        ]); 
        //para adicionar vários produtos a um pedido de uma vez, com o campo quantidade*/
        

        return redirect()->route('pedido-produto.create', ['pedido'=>$pedido->id]);
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
    //public function destroy(Pedido $pedido, Produto $produto)
    public function destroy(PedidoProduto $pedidoProduto, $pedido_id)
    {
        //echo 'pedido: '.$pedido->id.'- produto: '.$produto->id;

        /*convencional
        PedidoProduto::where([
            'pedido_id'=>$pedido->id,
            'produto_id'=>$produto->id
        ]);*/

        //$pedido->produtos()->detach($produto->id); //ou
        //$produto->pedidos()->detach($pedido_id);

        $pedidoProduto->delete(); //objeto já está instanciado

        return redirect()->route('pedido-produto.create', ['pedido'=>$pedido_id]);
    }
}
