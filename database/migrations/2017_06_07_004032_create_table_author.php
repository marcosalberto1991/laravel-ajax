<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAuthor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        if (!Schema::hastable('author')) {
                # code...
            Schema::create('author', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('email')->unigned();
                $table->string('password');
                //$table->rememberToken();
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
