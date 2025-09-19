<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao')->nullable();
            $table->string('local')->nullable();
            $table->integer('carga_horaria')->nullable();
            $table->date('data_inicio')->nullable();
            $table->date('data_fim')->nullable();
            $table->string('certificado_frente')->nullable(); // caminho da imagem
            $table->string('certificado_verso')->nullable();  // caminho da imagem
            $table->integer('coord_nome_cpf_x')->default(0); // coordenadas do texto
            $table->integer('coord_nome_cpf_y')->default(0);
            $table->integer('fonte')->default(16); // tamanho da fonte
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cursos');
    }
};
