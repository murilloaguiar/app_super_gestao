@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de pedidos</p>
        </div>

        <div class="menu mb-3">
            <ul>
                <li><a href="{{ route('pedido.create') }}">Novo</a></li>
            </ul>
        </div>

        <div class="container">


            <table class="table">
                <thead>
                    <tr>
                        <th>ID do pedido</th>
                        <th>Cliente</th>
                        <th>Adicionar Produtos</th>
                        <th>Visualizar</th>
                        <th>Excluir</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $pedido)
                        <tr>
                            <td>{{ $pedido->id }}</td>
                            <td>
                                @foreach ($clientes as $cliente)
                                    @if ($pedido->cliente_id == $cliente->id)
                                        {{ $cliente->nome }}
                                    @endif
                                @endforeach
                            </td>

                            <td><a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}" class="btn btn-success">
                                    <i class="bi bi-plus-square"></i>
                            </a></td>

                            <td><a href="{{ route('pedido.show', $pedido->id) }}" class="btn btn-secondary">
                                    <i class="bi bi-eye"></i>
                            </a></td>

                            <td>
                                <form method="post" id="form_{{ $pedido->id }}"
                                    action="{{ route('pedido.destroy', ['pedido' => $pedido->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{ $pedido->id }}').submit()"
                                        class="btn btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </form>
                            </td>

                            <td><a href="{{ route('pedido.edit', ['pedido' => $pedido->id]) }}" class="btn btn-primary">
                                    <i class="bi bi-pencil"></i>
                                </a></td>

                        </tr>

                    @endforeach
                </tbody>
            </table>

            {{ $pedidos->appends($request)->links() }}

            <br>
            Exibindo {{ $pedidos->count() }} pedidos de {{ $pedidos->total() }} ({{ $pedidos->firstItem() }} -
            {{ $pedidos->lastItem() }})



        </div>

    </div>
@endsection
