<?php
// database/migrations/xxxx_xx_xx_add_fields_to_dossiers_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToDossiersTable extends Migration
{
    public function up()
    {
        Schema::table('dossiers', function (Blueprint $table) {
            $table->string('email')->after('candidat');
            $table->string('cv')->nullable()->after('statut'); // chemin du fichier CV
            $table->string('lettre_motivation')->nullable()->after('cv'); // chemin du fichier LM
        });
    }

    public function down()
    {
        Schema::table('dossiers', function (Blueprint $table) {
            $table->dropColumn(['email', 'cv', 'lettre_motivation']);
        });
    }
}

