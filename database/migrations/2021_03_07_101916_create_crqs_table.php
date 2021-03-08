<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_crq', function (Blueprint $table) {
            $table->bigIncrements('pk_id_crq');
            $table->string('fk_id_pessoa');
            $table->timestamp('dt_validade');
            $table->string('nome_razao');
            $table->string('cpf_cnpj');
            $table->string('pendencia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crqs');
    }
}
