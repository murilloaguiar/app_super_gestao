<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Produto;
use App\Models\ProdutoDetalhe;
use App\Models\Unidade;
use App\Models\Item;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$produtos = Produto::paginate(10);
        
        foreach ($produtos as $key => $produto) {
            //print_r($produto->getAttributes());
            //echo '<br><br>';

            $produtoDetalhe = ProdutoDetalhe::where('produto_id',$produto->id)->first();

            if (isset($produtoDetalhe)) {
                //print_r($produtoDetalhe->getAttributes());

                $produtos[$key]['comprimento'] = $produtoDetalhe->comprimento;
                $produtos[$key]['largura'] = $produtoDetalhe->largura;
                $produtos[$key]['altura'] = $produtoDetalhe->altura;
            }
            //echo '<hr>';
        }*/

        //dd($fornecedores);
        $produtos = Item::with(['itemDetalhe','fornecedor'])->paginate(10);
        return view('app.produto.index',[
            'produtos' => $produtos,
            'request'=>$request->all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.create', [
            'unidades'=>$unidades,
            'fornecedores' =>$fornecedores
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $regras = [
            'nome'=> 'required|min:3|max:40',
            'descricao'=> 'required|max:200',
            'peso'=> 'required|integer',
            'unidade_id'=> 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no m??nimo tr??s caracteres',
            'nome.max' => 'O campo nome deve ter no m??ximo 40 caracteres',
            'descicao.max' => 'O campo nome deve ter no m??ximo 200 caracteres',
            'peso.integer' => 'O campo peso deve ser um n??mero inteiro',
            'unidade_id.exists' => 'A unidade de medida informada n??o existe',
            'fornecedor_id.exists' => 'O fornecedor informado n??o existe' 
        ];
        
        $request->validate($regras, $feedback);

        Item::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        //$produto objeto j?? inst??nciado com base no id informado na rota
        $produto->produtoDetalhe;
        $unidade_id = $produto->produtoDetalhe->unidade_id ?? '';

        $unidade = $unidade_id != '' ? Unidade::find($unidade_id)->unidade : '';
        return view('app.produto.show', [
            'produto'=>$produto,
            'unidade'=>$unidade
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.edit', [
            'produto'=>$produto,
            'unidades'=>$unidades,
            'fornecedores'=>$fornecedores
        ]);

        /*return view('app.produto.create', [
            'produto'=>$produto,
            'unidades'=>$unidades
        ]);*/

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $produto)
    {
        //print_r($request->all()); //payload
        //echo '<br><br><br><br>';
        //print_r($produto->getAttributes()); //inst??ncia do objeto no estado anterior a atualiza????o 

        //dd($request->all());

        $regras = [
            'nome'=> 'required|min:3|max:40',
            'descricao'=> 'required|max:200',
            'peso'=> 'required|integer',
            'unidade_id'=> 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no m??nimo tr??s caracteres',
            'nome.max' => 'O campo nome deve ter no m??ximo 40 caracteres',
            'descicao.max' => 'O campo nome deve ter no m??ximo 200 caracteres',
            'peso.integer' => 'O campo peso deve ser um n??mero inteiro',
            'unidade_id.exists' => 'A unidade de medida informada n??o existe',
            'fornecedor_id.exists' => 'O fornecedor informado n??o existe'    
        ];

        $request->validate($regras, $feedback);
        $produto->update($request->all());
        
        return redirect()->route('produto.show', $produto->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        //dd($produto);
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
