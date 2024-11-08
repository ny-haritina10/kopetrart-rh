<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('talent_needs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('study_year_start')->nullable();
            $table->integer('study_year_end')->nullable();
            $table->integer('experience_year_start')->nullable();
            $table->integer('experience_year_end')->nullable();
            $table->enum('contract_type', ['CDD', 'CDI']);
            $table->enum('gender', ['Homme', 'Femme'])->nullable();
            $table->integer('minimum_age')->nullable();
            $table->date('expiration_date')->nullable();
            $table->enum('priority', ['Low', 'Medium', 'High'])->default('Medium');
            $table->text('additional_info')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('talent_needs');
    }
};
