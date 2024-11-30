<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\HTLine;
use App\Models\DistributionTransformer;
use App\Models\Connection;
use App\Models\Pole;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    /**
     * 

     * Show the form for creating a new survey.
     */
    public function create()
    {
        return view('survey.create'); // Ensure the view file exists in resources/views/survey/create.blade.php
    }

    /**
     * Store a newly created survey in storage.
     */
    public function store(Request $request)
{
    // Validate the form data
    // $validated = $request->validate([
    //     'circle' => 'required|string|max:255',
    //         'division' => 'required|string|max:255',
    //         'sub_division' => 'required|string|max:255',
    //         'grid' => 'required|string|max:255',
    //         'feeder' => 'required|string|max:255',
    //         'distribution_system' => 'required|string|max:255',
    //         'entry_type' => 'required|string|max:255',
    //         'date_completion' => 'required|date',
    //         'work_order' => 'required|string|max:255',
    //         'head' => 'required|string|max:255',
    //         'sanctioned_by' => 'required|string|max:255',
    //         'vide_letter_no' => 'required|string|max:255',
    //         'survey_date' => 'required|date',
    // ]);
    $validated = $request->validate([
        'circle' => 'required|string|max:255',
        'division' => 'required|string|max:255',
        'sub_division' => 'required|string|max:255',
        'grid' => 'required|string|max:255',
        'feeder' => 'required|string|max:255',
        'distribution_system' => 'required|string|max:255',
        'entry_type' => 'required|string|max:255',
        'conductor_name' => 'required|string|max:255',
        'length_in_kms' => 'required|numeric',
        'transformer_capacity' => 'required|numeric',
        'quantity' => 'required|numeric',
        'location_coordinates' => 'required|string',
        'category' => 'required|string',  
        'connection_type' => 'required|string|max:255',
        'connection_quantity' => 'required|numeric',
        'connection_load' => 'required|numeric',
        'pole_type' => 'required|string|max:255',
        'pole_quantity' => 'required|numeric',
        'date_completion' => 'required|date',
        'work_order' => 'required|string|max:255',
        'head' => 'required|string|max:255',
        'sanctioned_by' => 'required|string|max:255',
        'vide_letter_no' => 'required|string|max:255',
        'survey_date' => 'required|date',
        // Adjust validation based on coordinate format
        
        
        
    ]);

    // Create the survey record
    $survey = Survey::create($validated);

    // Save HT lines, transformers, connections, and poles using relationships
    foreach ($request->ht_lines as $line) {
        $survey->htLines()->create($line);
    }

    foreach ($request->transformers as $transformer) {
        $survey->transformers()->create($transformer);
    }

    foreach ($request->connections as $connection) {
        $survey->connections()->create($connection);
    }

    foreach ($request->poles as $pole) {
        $survey->poles()->create($pole);
    }
    Survey::create($request->all());
    return redirect()->route('survey.index')->with('success', 'Survey submitted successfully!');
}

    // public function store(Request $request)
    // {
    //     // dd($request->all());
    //     // Validate the incoming form data
    //     $validated = $request->validate([
    //         'circle' => 'required|string|max:255',
    //         'division' => 'required|string|max:255',
    //         'sub_division' => 'required|string|max:255',
    //         'grid' => 'required|string|max:255',
    //         'feeder' => 'required|string|max:255',
    //         'distribution_system' => 'required|string|max:255',
    //         'entry_type' => 'required|string|max:255',
    //         'date_completion' => 'required|date',
    //         'work_order' => 'required|string|max:255',
    //         'head' => 'required|string|max:255',
    //         'sanctioned_by' => 'required|string|max:255',
    //         'vide_letter_no' => 'required|string|max:255',
    //         'survey_date' => 'required|date',
    //     ]);

    //     // Create a new Survey record
    //     $survey = Survey::create($validated);

    //     // Save HT Lines
    //     if ($request->has('ht_lines')) {
    //         foreach ($request->input('ht_lines') as $line) {
    //             $survey->htLines()->create($line);
    //         }
    //     }

    //     // Save Distribution Transformers
    //     if ($request->has('transformers')) {
    //         foreach ($request->input('transformers') as $transformer) {
    //             $survey->transformers()->create($transformer);
    //         }
    //     }

    //     // Save Connections
    //     if ($request->has('connections')) {
    //         foreach ($request->input('connections') as $connection) {
    //             $survey->connections()->create($connection);
    //         }
    //     }

    //     // Save Poles
    //     if ($request->has('poles')) {
    //         foreach ($request->input('poles') as $pole) {
    //             $survey->poles()->create($pole);
    //         }
    //     }

    //     // Redirect back with a success message
    //     return redirect()->back()->with('success', 'Survey submitted successfully!');
    // }
    // public function index()
    // {
    //     // Fetch all surveys from the database
    //     $surveys = Survey::all();
        
    //     // Return the 'survey.index' view with surveys data
    //     return view('survey.index', compact('surveys'));
    // }
    public function index() {
        $surveys = Survey::all(); 
        return view('survey.index', compact('surveys'));
    }
}

