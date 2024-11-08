<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('talent_needs', function (Blueprint $table) {
            $table->string('department')->nullable();
            $table->date('required_date')->nullable();
            $table->enum('status', ['En cours', 'Complété', 'Annulé'])->default('En cours');
        });
    }

    public function down()
    {
        Schema::table('talent_needs', function (Blueprint $table) {
            $table->dropColumn(['department', 'required_date', 'status']);
        });
    }
};
