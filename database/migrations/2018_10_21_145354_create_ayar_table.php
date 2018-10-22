<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAyarTable extends Migration{
    public function up(){
        Schema::create('ayar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tema');
            $table->string('twitter');
            $table->string('github');
            $table->string('linkedin'); 
            $table->timestamps();
        });
    }
    public function down(){
        Schema::dropIfExists('ayar');
    }
}
