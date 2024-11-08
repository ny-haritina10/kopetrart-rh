<?php
// app/Models/Dossier.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidat',
        'email',
        'poste',
        'date_reception',
        'statut',
        'cv',
        'lettre_motivation',
    ];

    protected $casts = [
        'date_reception' => 'date',
    ];

    // Méthode de filtre
    public function scopeFilter($query, $filters)
    {
        if (isset($filters['search']) && !empty($filters['search'])) {
            $query->where('candidat', 'like', '%' . $filters['search'] . '%');
        }

        if (isset($filters['poste']) && !empty($filters['poste'])) {
            $query->where('poste', $filters['poste']);
        }

        if (isset($filters['statut']) && !empty($filters['statut'])) {
            $query->where('statut', $filters['statut']);
        }

        return $query;
    }
}
