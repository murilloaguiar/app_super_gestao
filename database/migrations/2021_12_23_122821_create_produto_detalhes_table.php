<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoDetalhesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_detalhes', function (Blueprint $table) {
            $table->id();
            $table->float('comprimento', 8, 2);
            $table->unsignedBigInteger('produto_id'); //mesmo tipo do id da tabelma produtos
            $table->float('largura', 8, 2);
            $table->float('altura', 8, 2);
            $table->timestamps();

            //constraint de relacionamento, FK
            $table->foreign('produto_id')->references('id')->on('produtos');
            //o campo produto_id (chave estrangeira) faz referência ao campo id da tabela produtos
            $table->unique('produto_id'); //não pode existir produtos_id iguais, garantindo o relacionamento 1 para 1
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('produto_detalhes', function(Blueprint $table){
            //remover a fk
            $table->dropForeign('produtos_detalhes_produto_id_foreign');//[table]_[coluna]_foreign

            //remover a coluna
            $table->dropColumn('produto_id');
        });
        Schema::dropIfExists('produtos_detalhes');
    }
}
