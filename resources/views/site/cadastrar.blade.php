@extends('site.layouts.basico')

    @section('titulo', 'Cadastrar')

    @section('conteudo')

        <div class="conteudo-pagina">
            <div class="titulo-pagina">
                <h1>Fazer cadastro</h1>
            </div>

            <div class="informacao-pagina">
                <div style="width: 30%; margin-left: auto; margin-right:auto;">
                    <form action="{{route('site.cadastrar')}}" method="POST">
                        @csrf
                        <input type="text" name="name" placeholder="Seu nome de usuário" class="borda-preta" value="{{old('name')}}">
                        {{$errors->has('name') ? $errors->first('name'): ''}}

                        <input type="text" name="email" class="borda-preta" value="{{old('email')}}" placeholder="Digite o seu email">
                        {{$errors->has('email') ? $errors->first('email') : ''}}

                        <input type="password" name="password" placeholder="Senha" class="borda-preta" value="{{old('password')}}">
                        {{$errors->has('password') ? $errors->first('password'): ''}}

                        <button type="submit" class="borda-preta">Acessar</button>

                    </form>
                    {{ isset($erro) && $erro!='' ? $erro : ''}}
                </div>
            </div>  
        </div>

        <div class="rodape">
            <div class="redes-sociais">
                <h2>Redes sociais</h2>
                <img src="{{asset('img/facebook.png')}}">
                <img src="{{asset('img/linkedin.png')}}">
                <img src="{{asset('img/youtube.png')}}">
            </div>
            <div class="area-contato">
                <h2>Contato</h2>
                <span>(11) 3333-4444</span>
                <br>
                <span>supergestao@dominio.com.br</span>
            </div>
            <div class="localizacao">
                <h2>Localização</h2>
                <img src="{{asset('img/mapa.png')}}">
            </div>
        </div>
    @endsection