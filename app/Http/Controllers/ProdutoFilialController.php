<?php

namespace App\Http\Controllers;

use App\Models\ProdutoFilial;
use App\Models\Filial;
use App\Models\Item;
use Illuminate\Http\Request;


class ProdutoFilialController extends Controller
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
    public function create(Filial $filial){
        
        $produtos = Item::all();
        $filial->produtos;
        return view('app.produto_filial.create',[
            'filial'=>$filial,
            'produtos' => $produtos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProdutoFilialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Filial $filial)
    {
        
        $filial->produtos()->attach(
            $request->produto_id, [
                'preco_venda' => $request->preco_venda,
                'estoque_maximo' => $request->estoque_maximo,
                'estoque_minimo' => $request->estoque_minimo
            ]
        );

        return redirect()->route('produto-filial.create',['filial'=>$filial->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProdutoFilial  $produtoFilial
     * @return \Illuminate\Http\Response
     */
    public function show(ProdutoFilial $produtoFilial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProdutoFilial  $produtoFilial
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdutoFilial $produtoFilial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProdutoFilialRequest  $request
     * @param  \App\Models\ProdutoFilial  $produtoFilial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdutoFilial $produtoFilial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProdutoFilial  $produtoFilial
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdutoFilial $produtoFilial, $filial_id){
 
        $produtoFilial->delete();

        return redirect()->route('produto-filial.create',['filial'=>$filial_id]);
    }
}
