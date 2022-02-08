@extends('app.layouts.basico')

@section('titulo', 'Filial')

@section('conteudo')

    <div class="titulo-pagina-2">
        <p>Filiais-criar</p>
    </div>

    <main class="container">
        
        <section class="row">
            <div class="col-md-9">
                
                <h3>Cadastre uma filial</h3>
                
            </div>
            <div class="col-md-3 text-end">
                <a href="{{route('filial.index')}}">Voltar</a>
            </div>
        </section>

        <section>
            @component('app.filial._components.form_create_edit')
            
            @endcomponent
        </section>
        
    </main>
@endsection
