<?php

namespace App\Http\Controllers;

use App\Models\TalentNeed;
use App\Models\Department;
use Illuminate\Http\Request;

class TalentNeedController extends Controller
{
    public function index()
    {
        $talentNeeds = TalentNeed::all();
        return view('talent_needs.index', compact('talentNeeds'));
    }    

    public function create()
    {
        $departments = Department::all();
        return view('talent_needs.create', compact('departments'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'study_year_start' => 'nullable|integer',
            'study_year_end' => 'nullable|integer|gte:study_year_start',
            'experience_year_start' => 'nullable|integer',
            'experience_year_end' => 'nullable|integer|gte:experience_year_start',
            'contract_type' => 'required|in:CDD,CDI',
            'gender' => 'nullable|in:Homme,Femme',
            'minimum_age' => 'nullable|integer|min:18',
            'expiration_date' => 'nullable|date',
            'priority' => 'required|in:Low,Medium,High',
            'additional_info' => 'nullable|string',
            'department' => 'nullable|string|max:255',
            'required_date' => 'nullable|date',
            'status' => 'required|in:En cours,Complété,Annulé',
        ]);

        TalentNeed::create($request->all());

        return redirect()->route('talent_needs.index')->with('success', 'Talent need created successfully.');
    }

    public function edit($id)
    {
        $talentNeed = TalentNeed::findOrFail($id);
        $departments = Department::all();
        return view('talent_needs.edit', compact('talentNeed', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'study_year_start' => 'nullable|integer',
            'study_year_end' => 'nullable|integer|gte:study_year_start',
            'experience_year_start' => 'nullable|integer',
            'experience_year_end' => 'nullable|integer|gte:experience_year_start',
            'contract_type' => 'required|in:CDD,CDI',
            'gender' => 'nullable|in:Homme,Femme',
            'minimum_age' => 'nullable|integer|min:18',
            'expiration_date' => 'nullable|date',
            'priority' => 'required|in:Low,Medium,High',
            'additional_info' => 'nullable|string',
            'department' => 'nullable|string|max:255',
            'required_date' => 'nullable|date',
            'status' => 'required|in:En cours,Complété,Annulé',
        ]);

        $talentNeed = TalentNeed::findOrFail($id);
        $talentNeed->update($request->all());

        return redirect()->route('talent_needs.index')->with('success', 'Talent need updated successfully.');
    }
}
