@extends('app.layouts.basico')

@section('titulo', 'Pedido - Detalhes')

@section('conteudo')
    <div class="titulo-pagina-2">
        <p>Pedido de {{$cliente->id}}</p>
    </div>

    <div class="menu mb-3">
        <ul>
            <li><a href="{{ route('pedido.create') }}">Novo</a></li>
        </ul>
    </div>

    <div class="container">
        <table class="table">
            <thead>
                <th>Produto</th>
                <th>Preço Un.</th>
                <th>Quantidade</th>
            </thead>
            <tbody>
                @foreach ($pedidos_produtos as $pedido_produto)
                    <td>{{$pedido_produto->produto_id}}</td>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection