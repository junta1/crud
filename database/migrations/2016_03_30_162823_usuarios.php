<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function(Blueprint $table){
            
            $table->increments('id');
            $table->string('nome',255);
            $table->string('sobrenome',255);
            $table->string('email',255)->unique();
            $table->string('usuario',20)->unique();
            $table->char('senha',32);
            //Criando os campos created e update
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
        Schema::drop('usuarios');
    }
}
