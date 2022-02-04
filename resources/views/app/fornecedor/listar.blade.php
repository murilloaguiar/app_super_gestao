@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - listar</p>
        </div>
        
        <div class="menu mb-3">
            <ul>
                <li><a href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>
                <li><a href="{{route('app.fornecedor')}}">Consulta</a></li>
            </ul>
        </div>

        <div class="container">
            

            <table class="table table-primary table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Site</th>
                        <th>UF</th>
                        <th>Email</th>
                        <th>Excluir</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fornecedores as $fornecedor)
                        <tr>
                            <td>{{$fornecedor->nome}}</td>
                            <td>{{$fornecedor->site}}</td>
                            <td>{{$fornecedor->uf}}</td>
                            <td>{{$fornecedor->email}}</td>
                            <td><a href="{{route('app.fornecedor.excluir', $fornecedor->id)}}" class="btn btn-danger"><i class="bi bi-trash"></i></a></td>
                            <td><a href="{{route('app.fornecedor.editar', $fornecedor->id)}}" class="btn btn-primary"><i class="bi bi-pencil"></i></a></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p> Lista de produtos</p>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                    @foreach ($fornecedor->produtos as $key => $produto)
                                        <tr>
                                            <td>{{$produto->id}}</td> 
                                            <td>{{$produto->nome}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
            
            {{$fornecedores->appends($request)->links()}}
            {{-- 
            {{$fornecedores->count()}} - Total de registros por página
            {{$fornecedores->total()}} - Total de registros da consulta 
            {{$fornecedores->firstItem()}} - Número do primeiro registro na página por consulta
            {{$fornecedores->lastItem()}} - Número do ultimo registro na página por consulta --}}
            <br>
            Exibindo {{$fornecedores->count()}} fornecedores de {{$fornecedores->total()}} ({{$fornecedores->firstItem()}} - {{$fornecedores->lastItem()}})


            
        </div>
        
    </div>
@endsection
