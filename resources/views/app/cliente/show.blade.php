@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Cliente {{$cliente->nome}}</p>
        </div>
        
        <div class="menu mb-3">
            <ul>
                <li><a href="{{route('cliente.index')}}">Voltar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 80%; margin-left: auto; margin-right: auto;">

                <table border="1" width="100%" class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Excluir</th>
                            <th>Editar</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>{{$cliente->id}}</td>
                                <td>{{$cliente->nome}}</td>
                                
                                <td>
                                    <form method="post" id="form_{{$cliente->id}}" action="{{route ('cliente.destroy', ['cliente'=>$cliente->id])}}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                    </form>
                                </td>
                                <td><a href="{{route ('cliente.edit', ['cliente'=>$cliente->id])}}"class="btn btn-primary"><i class="bi bi-pencil"></i></a></td>
                            </tr>
                       
                    </tbody>
                </table>          
            </div>
        </div>
        
    </div>
@endsection