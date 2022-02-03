@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de produtos</p>
        </div>
        
        <div class="menu">
            <ul>
                <li><a href="{{route('produto.create')}}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 80%; margin-left: auto; margin-right: auto;">

                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Peso</th>
                            <th>Fornecedor</th>
                            <th>site fornecedor</th>
                            <th>Unidade_id</th>
                            <th>Comprimento</th>
                            <th>Altura</th>
                            <th>Largura</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produtos as $produto)
                            <tr>
                                <td>{{$produto->nome}}</td>
                                <td>{{$produto->descricao}}</td>
                                <td>{{$produto->peso}}</td>
                                <td>{{$produto->fornecedor->nome}}</td>
                                <td>{{$produto->fornecedor->site}}</td>
                                <td>{{$produto->unidade_id}}</td>
                                <td>{{$produto->itemDetalhe->comprimento ?? ''}}</td>
                                <td>{{$produto->itemDetalhe->altura ?? ''}}</td>
                                <td>{{$produto->itemDetalhe->largura ?? ''}}</td>
                                <td><a href="{{route ('produto.show', $produto->id)}}">Visualizar</a></td>
                                <td>
                                    <form action="{{route ('produto.destroy', $produto->id)}}" method="post" id="form_{{$produto->id}}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                                <td><a href="{{route ('produto.edit', $produto->id)}}">Editar</a></td>
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
        
    </div>
@endsection