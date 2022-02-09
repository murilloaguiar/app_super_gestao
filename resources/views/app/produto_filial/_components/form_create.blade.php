<form action="{{route('produto-filial.store',['filial'=>$filial->id])}}" method="post">
    @csrf


    <select name="produto_id" id="">
        <option value="">Produtos para adicionar</option>
        @foreach ($produtos as $produto)
            <option value={{$produto->id}}>{{$produto->nome}}</option>
        @endforeach
    </select>

    <input type="number" name="preco_venda" id="" placeholder="Preço">
    <input type="number" name="estoque_maximo" id="" placeholder="Estoque máximo">
    <input type="number" name="estoque_minimo" id="" placeholder="Estoque minimo">
    
    <button type="submit" class="btn btn-primary mt-3">Adicionar</button>
    
</form>