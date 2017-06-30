<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('Comment')) {
                # code...
            Schema::create('Comment', function (Blueprint $table) {
                $table->increments('id');
                //$table->string('title',50);
                $table->string('text');
                $table->timestamps();
                $table->integer('Post_id')->unigned();
                //$table->rememberToken();
            });

            Schema::table('Comment',function(Blueprint $table){
                $table->foreing('post_id')
                      ->references('id')
                      ->on('post'); 
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
