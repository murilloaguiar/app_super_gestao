<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return 'Olá seja bem vindo';
});

Route::get('/sobre-nos', function () {
    return 'Sobre-nos';
});

Route::get('/contato', function () {
    return 'Contato';
});

/*Route::get('/contato/{nome}/{categoria_id}', function(string $nome = 'desconhecido', int $categoria_id = 1){
    echo "estamos aqui: $nome - $categoria_id";
})->where('categoria_id', '[0-9]+')->where('nome','[A-Za-z]+');

//where faz a expressão regular informando qual é o parâmetro e qual deve ser os valores aceitos por ele

Route::get('/contato/{nome?}/{categoria?}/{assunto?}/{mensagem?}', function(string $nome = 'desconhecido', string $categoria = 'informação', string $assunto ='contato', string $mensagem = 'mensagem não informada'){
    echo "estamos aqui: $nome - $categoria - $assunto - $mensagem";
});*/
//interrogação ao fim do parametro indica que ele é opcional, mas é preciso definir um valor padrão. Mas isso deve ser feito da direita para a esquerda*/

Route::get('/','PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');
Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function(){
    Route::get('/home', 'HomeController@index')
    ->name('app.home');

    Route::get('/sair', 'LoginController@sair')
    ->name('app.sair');



    //--------fornecedor
    Route::get('/fornecedor', 'FornecedorController@index')
    ->name('app.fornecedor');

    Route::post('/fornecedor/listar', 'FornecedorController@listar')
    ->name('app.fornecedor.listar');

    Route::get('/fornecedor/listar', 'FornecedorController@listar')
    ->name('app.fornecedor.listar');
    
    Route::get('/fornecedor/adicionar', 'FornecedorController@adicionar')
    ->name('app.fornecedor.adicionar');

    Route::post('/fornecedor/adicionar', 'FornecedorController@adicionar')
    ->name('app.fornecedor.adicionar');

    Route::get('/fornecedor/editar/{id}/{msg?}', 'FornecedorController@editar')
    ->name('app.fornecedor.editar');

    Route::get('/fornecedor/excluir/{id}', 'FornecedorController@excluir')
    ->name('app.fornecedor.excluir');
    
    //--------produto
    Route::resource('produto', 'ProdutoController');

    //produto detalhes
    Route::resource('produto-detalhe', 'ProdutoDetalheController');


    Route::resource('cliente', 'ClienteController');
    Route::resource('pedido', 'PedidoController');
    //Route::resource('pedido-produto', 'PedidoProdutoController');

    Route::get('pedido-produto/create/{pedido}','PedidoProdutoController@create')->name('pedido-produto.create');

    Route::post('pedido-produto/store/{pedido}','PedidoProdutoController@store')->name('pedido-produto.store');

    //Route::delete('pedido-produto/destroy/{pedido}/{produto}','PedidoProdutoController@destroy')->name('pedido-produto.destroy');

    Route::delete('pedido-produto/destroy/{pedidoProduto}/{pedido_id}','PedidoProdutoController@destroy')->name('pedido-produto.destroy');

});
/*
Route::get('/rota1', function(){
    echo ' rota 1 ';
})->name('site.rota1');


Route::get('/rota2', function(){
    return redirect()->route('site.rota1');
})->name('site.rota2');*/

//o método prefix de route agrupa rotas. Espera como parâmetro o nome do prefixo e então com o groupo é passado para um função de callback as rotas a serem agrupadas

//o metodo name de Route dá um apelido para a rota, não precisando acessar seu caminho absoluto, isso ajuda nas dependencias diretas das rotas

//Route::redirect('/rota2', '/rota1');

//O objeto redirect de Route faz o redirecionamento de uma rota para outra. O primeiro parâmetro é a rota de origem, a segunda rota é a de destino

Route::fallback(function(){
    echo 'a rota acessada não existe. <a href="'.route('site.index').'">Clique aqui</a> para voltar para página inicial'; 
});

Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');

