@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Visualizar produto</p>
        </div>
        
        <div class="menu">
            <ul>
                <li><a href="{{route('produto.index')}}">Voltar</a></li>
                <li><a href="{{route('produto-detalhe.edit',['produto_detalhe'=>$produto->id])}}">Editar detalhes</a></li>
                
            </ul>
        </div>

        <div class="container">
            
            
                
            <table class="table">
                
                <tr>
                    <th>ID</th>
                    <td>{{$produto->id}}</td>
                </tr>
                    
                <tr>
                    <th>Nome</th>
                    <td>{{$produto->nome}}</td>
                </tr>

                <tr>
                    <th>Descrição</th>
                    <td>{{$produto->descricao}}</td>
                </tr>

                <tr>
                    <th>Peso</th>
                    <td>{{$produto->peso}} kg </td>
                    
                </tr>

                <tr>
                    <th>Unidade_id</th>
                    <td>{{$produto->unidade_id}}</td>
                </tr>
                    
                
            </table>
            
        </div>
        
    </div>
@endsection