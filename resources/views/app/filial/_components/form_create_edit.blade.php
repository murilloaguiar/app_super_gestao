@if (isset($filial->id))
    <form action="{{route('filial.update', ['filial'=>$filial->id])}}" method="post">
        @csrf
        @method('PUT')
    
@else
    <form action="{{route('filial.store')}}" method="post">
        @csrf
    
@endif
        <label for="inputFilial">Nome da filial</label>
        <input type="text" name="filial" id="inputFilial"  class="form-control" value="{{$filial->filial ?? old('filial')}}">
        {{$errors->has('filial') ? $errors->first('filial') : ''}}

        <button type="submit" class="btn btn-primary mt-3">Cadastrar</button>
    </form>