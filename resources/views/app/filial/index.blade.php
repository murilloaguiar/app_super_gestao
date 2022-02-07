@extends('app.layouts.basico')

@section('titulo', 'Filial')

@section('conteudo')

    <div class="titulo-pagina-2">
        <p>Filiais</p>
    </div>

    <main class="container">
        
        <section class="row">
            <div class="col-md-9">

                @if (!$numeroFiliais)
                    <h3>Ainda não existem filiais</h3>
                @endif

            </div>
            <div class="col-md-3 text-end">
                <a href="{{route('filial.create')}}">Novo</a>
            </div>
        </section>
        
    </main>
@endsection
