<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        if (!Schema::hastable('Cliente')) {
                # code...
            Schema::create('Cliente', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nombre');
                $table->string('apellido');
                $table->string('Direccion');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
