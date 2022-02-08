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
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Editar</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($filiais as $filial)
                                <tr>
                                    <td>{{$filial->id}}</td>
                                    <td>{{$filial->filial}}</td>

                                    <td><a href="{{route('filial.edit',['filial'=>$filial->id])}}" class="btn btn-primary"><i class="bi bi-pencil"></i></a></td>

                                    <td>
                                        <form action="{{route('filial.destroy',['filial'=>$filial->id])}}" id="form_{{$filial->id}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <a href="#" onclick="document.querySelector('#form_{{$filial->id}}').submit()" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                            
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

            </div>
            <div class="col-md-3 text-end">
                <a href="{{route('filial.create')}}">Nova filial</a>
            </div>
        </section>

        
    </main>
@endsection
