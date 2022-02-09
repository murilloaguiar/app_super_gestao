@extends('app.layouts.basico')

@section('titulo', 'Produto Filial')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Produtos a Filial</p>
        </div>

        <div class="menu mb-3">
            <ul>
                <li><a href="{{ route('filial.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <h4>Detalhes da filial</h4>
            <p>Id da filial: {{ $filial->id }}</p>
            <p>Nome da filial: {{ $filial->filial }}</p>
        
            <div style="width: 40%; margin-left: auto; margin-right: auto;">
                <h4>Produtos da filial</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Preço venda</th>
                            <th>Excluir</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($filial->produtos as $produto)
                            <tr>
                                <td>{{ $produto->id }}</td>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->pivot->preco_venda }}</td>
            
                                <td>{{-- <form action="{{route('pedido-produto.destroy',['pedido'=>$pedido->id, 'produto'=>$produto->id])}}" id="form_{{$pedido->id}}_{{$produto->id}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('id=form_{{$pedido->id}}_{{$produto->id}}').submit()">Excluir</a>
                                    </form> --}}

                                    <form
                                        action="{{ route('produto-filial.destroy',['produtoFilial'=>$produto->pivot->id, 'filial_id'=>$filial->id]) }}"
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
                @component('app.produto_filial._components.form_create', [
                    'filial' => $filial,
                    'produtos' => $produtos,
                    ])

                @endcomponent
            </div>
        </div>

    </div>
@endsection
