<?php

namespace App\Http\Controllers;

use App\Models\ProdutoDetalhe;
Use App\Models\Unidade;
use App\Models\ItemDetalhe;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class ProdutoDetalheController extends Controller
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
    public function create()
    {
        $unidades = Unidade::all();
        return view('app.produto_detalhe.create',[
            'unidades'=>$unidades
        ]);

        return redirect()->route('produto.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produtoDetalhe = new ProdutoDetalhe;
        $request->validate($produtoDetalhe->rules(),$produtoDetalhe->feedback());
        ProdutoDetalhe::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProdutoDetalhe  $produtoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function show(ProdutoDetalhe $produtoDetalhe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProdutoDetalhe  $produtoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function edit(/*ProdutoDetalhe $produtoDetalhe*/ $id)
    {
        //dd($produtoDetalhe);
        $produtoDetalhe = ItemDetalhe::with(['item'])->find($id);
        $unidades = Unidade::all();
        return view('app.produto_detalhe.edit',[
            'produto_detalhe'=>$produtoDetalhe,
            'unidades'=>$unidades
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProdutoDetalhe  $produtoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdutoDetalhe $produtoDetalhe)
    {
        $request->validate($produtoDetalhe->rules(),$produtoDetalhe->feedback());
        $produtoDetalhe->update($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProdutoDetalhe  $produtoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdutoDetalhe $produtoDetalhe)
    {
        //
    }
}
