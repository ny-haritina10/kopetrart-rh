<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration
{
   
    public function up()
    {
        Schema::create('postes', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('postes');
    }
}