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
        // $pop = Pop::findOrFail(1);
        // $pops = $pop->user->first_name;

        $pops = Pop::get([
            'id as id',
            'user_id as userId',
            'user_finished as userFinished',
            'user_finished_at as userFinishedAt',
            'evaluated_by as evaluatedBy',
            'evaluation_finished as evaluationFinished',
            'evaluation_finished_at as evaluationFinishedAt',
            'created_at as createdAt',
            'updated_at as updatedAt',
        ]);

        foreach ($pops as $pop) {
            $user = User::where('id', $pop->userId)->get(['id', 'first_name', 'last_name', 'email']);
            $user = $user->flatten();
            $map = $user->map(function ($items) {
                $data['firstName'] = $items->first_name;
                $data['lastName'] = $items->last_name;
                $data['email'] = $items->email;
                $data['displayName'] = $items->first_name . ' ' . $items->last_name;
                return $data;
            });
            $pop->user = $map;
        }

        return Inertia::render('PopEvaluation/EvaluationOverview', [
            'pops' => $pops,
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