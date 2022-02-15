@extends('app.layouts.basico')

@section('titulo', 'Cliente Buscar')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Cliente - Pesquisar</p>
        </div>
        
        <div class="menu">
            <ul>
                <li><a href="{{route('cliente.create')}}">Novo</a></li>
                <li><a href="{{route('cliente.index')}}">Voltar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form action="{{route('cliente.list')}}" method="post">
                    @csrf
                    <input type="text" name="nome" placeholder="nome" class="borda-preta">
                    <button type="submit" class="borda-preta">Pesquisar</button>
                </form>

            </div>
        </div>
        
    </div>
@endsection