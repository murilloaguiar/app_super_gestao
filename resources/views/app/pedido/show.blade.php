@extends('app.layouts.basico')

@section('titulo', 'Pedido - Detalhes')

@section('conteudo')
    <div class="titulo-pagina-2">
        <p>Pedido de {{$cliente->nome}}</p>
    </div>

    <div class="menu mb-3">
        <ul>
            <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
        </ul>
    </div>

    <div class="container">
        <table class="table">
            <thead>
                <th>Produto</th>
                {{-- <th>Preço Un.</th> --}}
                <th>Quantidade</th> 
            </thead>
            <tbody>
                @foreach ($pedido->produtos as $produto)
                  <tr>
                    <td>{{$produto->nome}}</td>
                    <td>{{$produto->pivot->quantidade}}</td>
                    {{-- <td>{{$produtos->pivot->preco_venda}}</td> --}}
                  </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection