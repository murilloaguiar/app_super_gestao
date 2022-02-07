@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de produtos</p>
        </div>
        
        <div class="menu mb-3">
            <ul>
                <li><a href="{{route('produto.create')}}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="container">
        

            <table class="table table-primary table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Fornecedor</th>
                        <th>Visualizar</th>
                        <th>Excluir</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produtos as $produto)
                        <tr>
                            <td>{{$produto->nome}}</td>
                            <td>{{$produto->descricao}}</td>
                            <td>{{$produto->fornecedor->nome}}</td>
                            <td><a href="{{route ('produto.show', $produto->id)}}"class="btn btn-secondary"><i class="bi bi-eye"></i></a></td>
                            <td>
                                <form action="{{route ('produto.destroy', $produto->id)}}" method="post" id="form_{{$produto->id}}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()"class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                </form>
                            </td>
                            <td><a href="{{route ('produto.edit', $produto->id)}}"class="btn btn-primary"><i class="bi bi-pencil"></i></a></td>
                        </tr>

                        <tr>
                            <td colspan="12">
                                <p>pedidos</p>
                                @foreach ($produto->pedidos as $pedido)
                                    <a href="{{route('pedido-produto.create',['pedido'=>$pedido->id])}}">
                                        pedido: {{$pedido->id}}, 
                                    </a>
                                    
                                @endforeach
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
            
            {{$produtos->appends($request)->links()}}
    
            <br>
            Exibindo {{$produtos->count()}} produtos de {{$produtos->total()}} ({{$produtos->firstItem()}} - {{$produtos->lastItem()}})


            
        </div>
        
    </div>
@endsection