<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Fetch surveys with search and paginate
        $surveys = Survey::when($search, function ($query, $search) {
                return $query->where('circle', 'like', "%$search%")
                    ->orWhere('division', 'like', "%$search%")
                    ->orWhere('work_order', 'like', "%$search%");
            })
            ->paginate(10)
            ->withQueryString(); // Keep search query in pagination links

        return view('surveys.index', compact('surveys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('surveys.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'circle' => 'required|string|max:255',
            'division' => 'required|string|max:255',
            'sub_division' => 'nullable|string|max:255',
            'work_order' => 'required|string|max:255',
            'completion_date' => 'required|date',
            'survey_date' => 'required|date',
        ]);

        // Create new survey
        Survey::create($validated);

        return redirect()->route('surveys.index')->with('success', 'Survey created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Survey $survey)
    {
        return view('surveys.show', compact('survey'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Survey $survey)
    {
        return view('surveys.edit', compact('survey'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Survey $survey)
    {
        // Validate incoming request
        $validated = $request->validate([
            'circle' => 'required|string|max:255',
            'division' => 'required|string|max:255',
            'sub_division' => 'nullable|string|max:255',
            'work_order' => 'required|string|max:255',
            'completion_date' => 'required|date',
            'survey_date' => 'required|date',
        ]);

        // Update survey
        $survey->update($validated);

        return redirect()->route('surveys.index')->with('success', 'Survey updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Survey $survey)
    {
        $survey->delete();

        return redirect()->route('surveys.index')->with('success', 'Survey deleted successfully.');
    }
}
