<?php

namespace App\Http\Controllers;
use App\Models\Fornecedor;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        
        
        return view('app.fornecedor.index');
        

        //$fornecedores = ['Fornecedor 1'];
        /*
        $fornecedores = [
            0 => [
                'nome'=>'Fornecedor 1',
                'status' => 'N',
                'cnpj' => '00.000.000/000-00',
                'ddd' => '11',
                'telefone' => '0000-0222'
            ],
            1 => [
                'nome'=>'Fornecedor 2',
                'status' => 'S',
                'ddd' => '85',
                'telefone' => '0000-0222'
            ],
            2 => [
                'nome'=>'Fornecedor 3',
                'status' => 'S',
                'ddd' => '32',
                'telefone' => '0000-0222'
            ]
        ];

        $msg = isset($fornecedores[1]['cnpj']) ? 'CNPJ informdo': 'CNPJ não informado';

        echo $msg;

        return view('app.fornecedores.index', compact('fornecedores'));*/
    }

    public function listar(Request $request){
        //dd($request->all());
        $fornecedores = Fornecedor::with(['produtos'])->where('nome', 'like','%'.$request->input('nome').'%')
        ->where('site', 'like','%'.$request->input('site').'%')
        ->where('uf', 'like','%'.$request->input('uf').'%')
        ->where('email', 'like','%'.$request->input('email').'%')
        ->paginate(5);

        //dd($fornecedores);
        return view('app.fornecedor.listar',[
            'fornecedores' => $fornecedores,
            'request'=>$request->all()
        ]);
    }

    public function adicionar(Request $request){

        $msg = '';

        //valindo token csrf. Preenche se não for para edição
        if ($request->input('_token') != '' && $request->input('id') == '') {
            # cadastro...
            //validando dados
            $regras = [
                'nome'=> 'required|min:3|max:40',
                'site'=> 'required',
                'uf'=> 'required|min:2|max:2',
                'email'=> 'email'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo nome deve ter no mínimo três caracteres',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'uf.min' => 'O campo uf deve ter no mínimo três caracteres',
                'uf.max' => 'O campo uf deve ter no máximo 2 caracteres',
                'email.email' => 'O campo email deve ser um email válido'
                
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = 'cadastro realizado com sucesso';

        } 

        //edição
        if ($request->input('_token') != '' && $request->input('id') != '') {
            # edição...
            
            $fornecedor = Fornecedor::find($request->input('id'));

            //editando
            $update = $fornecedor->update($request->all());

            if ($update) {
                $msg = 'update realizado com sucesso';
            }else{
                $msg = 'update não realizado com sucesso';
            }

            return redirect()->route('app.fornecedor.editar', ['id'=>$request->input('id'), 'msg'=>$msg, ]);
        }
        

        return view('app.fornecedor.adicionar', ['msg'=>$msg]);
    }

    public function editar($id, $msg = ''){
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar',['fornecedor' => $fornecedor, 'msg'=>$msg]);
      
        //dd($fornecedor);
    }

    public function excluir($id){
        Fornecedor::find($id)->delete();

        return redirect()->route('app.fornecedor');
    }
}
