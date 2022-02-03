<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjusteProdutosFiliais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //criando tabela filiais
        Schema::create('filiais', function(Blueprint $table){
            $table->id();
            $table->timestamps();
            $table->string('filial',30);
        });

        //criando tabela produto_filiais
        Schema::create('produto_filiais', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            $table->float('preco_venda',8,2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_máximo');
            $table->string('filial',30);

            //constraints
            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');

        });

        //removendo colunas da tabela produtos
        Schema::table('produtos', function(Blueprint $table){
            
            $table->dropColumn(['preco_venda','estoque_minimo','estoque_máximo']);
            
        });

       

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //adicionando colunas na tabela produtos
        Schema::table('produtos', function(Blueprint $table){
        
            $table->float('preco_venda',8,2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_máximo');
            
        });

        Schema::dropIfExists('produtos_filiais');
        Schema::dropIfExists('filiais');
    }
}
