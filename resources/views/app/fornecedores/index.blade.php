<h3>Fornecedor</h3>

{{-- Isso é um comentário pelo blade 

{{'Texto de teste'}}
<?= 'Texto de teste'; ?>--}}

@php
    // comentários dentro do php

    //echo 'Texto de teste'

@endphp

{{--@dd($fornecedores)


 @if (count($fornecedores>0) && count($fornecedores) < 10)
    <h3>Exsitm alguns fornecedores cadastrados</h3>
@elseif (count($fornecedores>10))
    <h3>Existem vários fornecedores cadastrados</h3>
@else
    <h3>Ainda não existem fornecedores cadastrados</h3>
@endif

@isset($fornecedores)
    Fornecedor: {{$fornecedores[1]['nome'] }}
    <br>
    status: {{$fornecedores[1]['status']}}
    <br>
    @isset($fornecedores[1]['cnpj'])
        cnpj: {{$fornecedores[1]['cnpj']}}
        @empty($fornecedores[0]['cnpj'])  
            -vazio
        @endempty
    @endisset

    {{-- @unless ($fornecedores[0]['status']=='S') retorna somente se a condição for falsa
        Fornecedor Inativo
    @endunless

    @if (!($fornecedores[0]['status']=='S'))
        Fornecedor Inativo
    @endif
@endisse

@isset($fornecedores)
    Fornecedor: {{$fornecedores[0]['nome'] }}
    <br>
    status: {{$fornecedores[0]['status']}}
    <br>
    cnpj: {{$fornecedores[0]['cnpj'] ?? 'dado nao foi preenchido'}}
@endisset       
se a variável testada não estiver definida
ou
variável testada possuir o valor null, o operador ?? fornece um valor padrão caso a variável atenda algum dos requisitos acima

@isset($fornecedores)
    Fornecedor: {{$fornecedores[1]['nome'] }}
    <br>
    status: {{$fornecedores[1]['status']}}
    <br>
    cnpj: {{$fornecedores[1]['cnpj'] ?? 'dado nao foi preenchido'}}
    <br>
    telefone: {{$fornecedores[1]['telefone']}}
    <br>
    @switch($fornecedores[0]['ddd'])
        @case ('11')
            São paulo
            @break
        @case ('85')
            Fortaleza
            @break
        @case ('32')
            Juiz de Fora
            @break
        @default
            Cidade não encontrada
    @endswitch
@endisset  

@isset($fornecedores)
    @for ($i = 0; isset($fornecedores[$i]) ; $i++)
        Fornecedor: {{$fornecedores[$i]['nome'] }}
        <br>
        status: {{$fornecedores[$i]['status']}}
        <br>
        cnpj: {{$fornecedores[$i]['cnpj'] ?? 'dado nao foi preenchido'}}
        <br>
        telefone: {{$fornecedores[$i]['telefone']}}
        <br>
        <hr>
    @endfor 
@endisset 
<br>--}} 

@isset($fornecedores)
    @php $i=0 @endphp
    @while(isset($fornecedores[$i]))
        Fornecedor: {{$fornecedores[$i]['nome'] }}
        <br>
        status: {{$fornecedores[$i]['status']}}
        <br>
        cnpj: {{$fornecedores[$i]['cnpj'] ?? 'dado nao foi preenchido'}}
        <br>
        telefone: {{$fornecedores[$i]['telefone']}}
        <br>
        <hr>
        @php $i++ @endphp
    @endwhile
@endisset
