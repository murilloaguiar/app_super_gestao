<?php

namespace App\Http\Controllers;

use App\Models\ProdutoFilial;
use App\Http\Requests\StoreProdutoFilialRequest;
use App\Http\Requests\UpdateProdutoFilialRequest;

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProdutoFilialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProdutoFilialRequest $request)
    {
        //
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
    public function update(UpdateProdutoFilialRequest $request, ProdutoFilial $produtoFilial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProdutoFilial  $produtoFilial
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdutoFilial $produtoFilial)
    {
        //
    }
}
