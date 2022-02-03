<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProdutosRelacionamentoFornecedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //criando a coluna em produtos que vai receber a fk de fornecedores
        Schema::table('produtos', function(Blueprint $table){

            //inserir um registro de fornecedor para estabelecer o relacionamento
            $fornecedor_id = DB::table('fornecedores')->insertGetId([
                'nome'=> 'Fornecedor Padrão SG',
                'site'=>'fornecedorpadrao.com.br',
                'uf'=>'SP',
                'email'=> 'contato@fornecedorpadrao.com.br'
            ]); //insere o registro e recupera o seu id no banco

            $table->unsignedBigInteger('fornecedor_id')->default($fornecedor_id)->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('produtos', function(Blueprint $table){
            $table->dropForeign('produtos_fornecedor_id_foreign')->references('id')->on('fornecedores');
            $table->dropColumn('fornecedor_id');
        });
    }
}
