<?php
// database/migrations/xxxx_xx_xx_create_dossiers_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDossiersTable extends Migration
{
    public function up()
    {
        Schema::create('dossiers', function (Blueprint $table) {
            $table->id();
            $table->string('candidat');
            $table->string('email');
            $table->string('poste');
            $table->date('date_reception');
            $table->string('statut')->default('Nouveau');
            $table->string('cv')->nullable();
            $table->string('lettre_motivation')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('dossiers');
    }
}
