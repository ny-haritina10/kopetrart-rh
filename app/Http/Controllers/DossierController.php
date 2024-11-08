<?php
namespace App\Http\Controllers;

use App\Models\Dossier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DossierController extends Controller
{
    // Méthode d'affichage des dossiers
    public function index(Request $request)
    {
        $filters = $request->only(['search', 'poste', 'statut']);
        $dossiers = Dossier::filter($filters)->get();
        return view('dossiers.index', compact('dossiers'));
    }

    // Méthode pour afficher le formulaire de création
    public function create()
    {
        return view('dossiers.create');
    }

    // Méthode pour stocker le dossier
    public function store(Request $request)
    {
        $validated = $request->validate([
            'candidat' => 'required|string|max:255',
            'email' => 'required|email',
            'poste' => 'required|string',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'lettre_motivation' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $cvPath = $request->file('cv') ? $request->file('cv')->store('cvs', 'public') : null;
        $lmPath = $request->file('lettre_motivation') ? $request->file('lettre_motivation')->store('lettres', 'public') : null;

        Dossier::create([
            'candidat' => $validated['candidat'],
            'email' => $validated['email'],
            'poste' => $validated['poste'],
            'date_reception' => now(),
            'statut' => 'Nouveau',
            'cv' => $cvPath,
            'lettre_motivation' => $lmPath,
        ]);

        return redirect()->route('dossiers.index')->with('success', 'Dossier ajouté avec succès.');
    }

    // Méthode pour afficher le formulaire de modification
    public function edit(Dossier $dossier)
    {
        return view('dossiers.create', compact('dossier'));
    }

    // Méthode pour mettre à jour le dossier
    public function update(Request $request, Dossier $dossier)
    {
        $validated = $request->validate([
            'candidat' => 'required|string|max:255',
            'email' => 'required|email',
            'poste' => 'required|string',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'lettre_motivation' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($request->hasFile('cv')) {
            // Supprimer l'ancien CV et enregistrer le nouveau
            Storage::delete('public/' . $dossier->cv);
            $cvPath = $request->file('cv')->store('cvs', 'public');
        } else {
            $cvPath = $dossier->cv; // Ne pas toucher à l'ancien fichier si aucun nouveau fichier n'est uploadé
        }

        if ($request->hasFile('lettre_motivation')) {
            // Supprimer l'ancienne lettre de motivation et enregistrer la nouvelle
            Storage::delete('public/' . $dossier->lettre_motivation);
            $lmPath = $request->file('lettre_motivation')->store('lettres', 'public');
        } else {
            $lmPath = $dossier->lettre_motivation; // Ne pas toucher à l'ancienne lettre de motivation si aucun nouveau fichier n'est uploadé
        }

        $dossier->update([
            'candidat' => $validated['candidat'],
            'email' => $validated['email'],
            'poste' => $validated['poste'],
            'cv' => $cvPath,
            'lettre_motivation' => $lmPath,
        ]);

        return redirect()->route('dossiers.index')->with('success', 'Dossier mis à jour avec succès.');
    }

    // Méthode pour supprimer le dossier
    public function destroy(Dossier $dossier)
    {
        // Supprimer les fichiers associés
        if ($dossier->cv) {
            Storage::disk('public')->delete($dossier->cv);
        }
        if ($dossier->lettre_motivation) {
            Storage::disk('public')->delete($dossier->lettre_motivation);
        }

        // Supprimer le dossier de la base de données
        $dossier->delete();

        return redirect()->route('dossiers.index')->with('success', 'Dossier supprimé avec succès.');
    }
}
