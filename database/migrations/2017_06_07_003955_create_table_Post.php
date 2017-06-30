<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('Post')) {
                # code...
            Schema::create('Post', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title',50);
                $table->string('text');
                $table->timestamps();
                $table->integer('author_id')->unigned();
                //$table->rememberToken();
            });

            Schema::table('Post',function(Blueprint $table){
                $table->foreing('author_id')
                      ->references('id')
                      ->on('author'); 
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
        Schema::dropIfExists('users');
    }
}
