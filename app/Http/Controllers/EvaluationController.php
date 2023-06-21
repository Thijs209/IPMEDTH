<?php

namespace App\Http\Controllers;

use App\Http\Resources\PopResource;
use App\Http\Resources\UserResource;
use App\Models\Evaluation;
use App\Models\Pop;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('PopEvaluation/EvaluationOverview', [
            'pops' => PopResource::collection(Pop::all()),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)    
    {
    $pop = Pop::findOrFail($id);

    if ($pop) {
        return Inertia::render('PopEvaluation/EvaluatePop', [
            'pop' => PopResource::make($pop),
        ]);
    }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evaluation $evaluation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evaluation $evaluation)
    {
        //
    }
}
