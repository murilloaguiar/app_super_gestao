@extends('app.layouts.basico')

@section('titulo', 'Pedido Produto')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Produtos ao pedido</p>
        </div>

        <div class="menu mb-3">
            <ul>
                <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <h4>Detalhes do pedido</h4>
            <p>Id do pedido: {{ $pedido->id }}</p>
            <p>Cliente: {{ $pedido->cliente_id }}</p>

            <div style="width: 40%; margin-left: auto; margin-right: auto;">
                <h4>Itens do pedido</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Data de criação</th>
                            <th>Quantidade</th>
                            <th>Excluir</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedido->produtos as $produto)
                            <tr>
                                <td>{{ $produto->id }}</td>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->pivot->created_at->format('d/m/Y') }}</td>
                                <td>{{ $produto->pivot->quantidade}}</td>
                                <td>{{-- <form action="{{route('pedido-produto.destroy',['pedido'=>$pedido->id, 'produto'=>$produto->id])}}" id="form_{{$pedido->id}}_{{$produto->id}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('id=form_{{$pedido->id}}_{{$produto->id}}').submit()">Excluir</a>
                                    </form> --}}

                                    <form
                                        action="{{ route('pedido-produto.destroy', ['pedidoProduto' => $produto->pivot->id, 'pedido_id' => $pedido->id]) }}"
                                        id="form_{{ $produto->pivot->id }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $produto->pivot->id }}').submit()"class="btn btn-danger"><i class="bi bi-trash"></i>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @component('app.pedido_produto._components.form_create', [
                    'pedido' => $pedido,
                    'produtos' => $produtos,
                    ])

                @endcomponent
            </div>
        </div>

    </div>
@endsection
