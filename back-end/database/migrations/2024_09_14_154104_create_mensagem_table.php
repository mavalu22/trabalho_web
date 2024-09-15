<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mensagem', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('idAssunto')->nullable();
            $table->unsignedBigInteger('id_usuario');

        $table->char('titulo', 128);
        $table->text('conteudo')->nullable();
        $table->timestamps();


        $table->foreign('id_usuario')->references('id')->on('users');
        $table->foreign('idAssunto')->references('id')->on('assunto')->onDelete('set null');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensagem');
    }
};
