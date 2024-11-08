<?php

namespace App\Http\Controllers;

use App\Models\Dossier;
use App\Models\Profile;
use Illuminate\Http\Request;

class ComparisonController extends Controller
{
    public function index($id)
    {
        $dossier = Dossier::findOrFail($id);
        $profile = Profile::first(); // Supposons que nous n'avons qu'un seul profil requis

        $matchScore = $this->calculateMatchScore($dossier, $profile);

        return view('comparaison', [
            'dossier' => $dossier,
            'profile' => $profile,
            'matchScore' => $matchScore
        ]);
    }

    private function calculateMatchScore($dossier, $profile)
    {
        // Logique de calcul du score de correspondance entre le CV du candidat et le profil requis
        // Cette logique peut être plus complexe en fonction de vos besoins
        $technicalSkillsMatch = $this->compareSkills($dossier->technical_skills, $profile->technical_skills);
        $experienceMatch = $this->compareExperience($dossier->experience_years, $profile->experience_years);

        $totalMatch = ($technicalSkillsMatch + $experienceMatch) / 2;
        return round($totalMatch * 100, 2);
    }

    private function compareSkills($candidateSkills, $requiredSkills)
    {
        // Logique de comparaison des compétences techniques
        // Cette logique peut être plus complexe en fonction de vos besoins
        $matchedSkills = array_intersect($candidateSkills, $requiredSkills);
        return count($matchedSkills) / count($requiredSkills);
    }

    private function compareExperience($candidateExperience, $requiredExperience)
    {
        // Logique de comparaison de l'expérience
        // Cette logique peut être plus complexe en fonction de vos besoins
        return $candidateExperience >= $requiredExperience ? 1 : $candidateExperience / $requiredExperience;
    }
}