<?php

namespace App\Http\Controllers;

use App\Models\Filial;
use Illuminate\Http\Request;

class FilialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
    
        return view('app.filial.index',[
            'filiais' => Filial::all(),
            'numeroFiliais' => Filial::count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.filial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFilialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filial = new Filial;
        $request->validate($filial->rules(), $filial->feedback());
        Filial::create($request->all());

        return redirect()->route('filial.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Filial  $filial
     * @return \Illuminate\Http\Response
     */
    public function show(Filial $filial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Filial  $filial
     * @return \Illuminate\Http\Response
     */
    public function edit(Filial $filial)
    {
        return view('app.filial.edit', [
            'filial' => $filial
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFilialRequest  $request
     * @param  \App\Models\Filial  $filial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Filial $filial){
        
        $request->validate($filial->rules(), $filial->feedback());

        $filial->update($request->all());

        return redirect()->route('filial.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Filial  $filial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Filial $filial)
    {
        $filial->delete();

        return redirect()->route('filial.index');
    }
}
