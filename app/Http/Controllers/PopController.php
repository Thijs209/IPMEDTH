<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorepopRequest;
use App\Http\Requests\UpdatepopRequest;

use App\Models\Pop;
use App\Models\Opdracht;
use App\Models\Kernkwadrant;
use App\Models\Doel;

use App\Http\Resources\PopResource;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PopResource::collection(Pop::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('CreatePop');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorepopRequest $request)
    {
        $pop = Pop::create($request->validated());

        error_log($request->input('opdracht.doel'));
        error_log($pop['id']);

        // save opdracht
        $opdracht = new Opdracht();
        $opdracht->pop_id = $pop['id'];
        $opdracht->opdracht_doel = $request->input('opdracht.doel');
        $opdracht->resultaat = $request->input('opdracht.resultaat');
        $opdracht->succesvol = $request->input('opdracht.succesvol');
        $opdracht->leidinggevende = $request->input('opdracht.leidinggevende');
        $opdracht->rapporteer_anderen = $request->input('opdracht.rapporteer_anderen');
        $opdracht->save();

        // save kernkwadranten
        $kernKwadrantData = $request->input('kern_kwadranten');

        foreach($kernKwadrantData as $kernKwadrantItem){
            $kernkwadrant = new Kernkwadrant();
            $kernkwadrant->pop_id = $pop['id'];
            $kernkwadrant->kern_kwaliteit = $kernKwadrantItem['kern_kwaliteit'];
            $kernkwadrant->valkuil = $kernKwadrantItem['valkuil'];
            $kernkwadrant->allergie = $kernKwadrantItem['allergie'];
            $kernkwadrant->uitdaging = $kernKwadrantItem['uitdaging'];
            $kernkwadrant->save();


        }

        // save doelen
        $kernKwadrantData = $request->input('kern_kwadranten');

        foreach($kernKwadrantData as $kernKwadrantItem){
            $kernkwadrant = new Kernkwadrant();
            $kernkwadrant->pop_id = $pop['id'];
            $kernkwadrant->kern_kwaliteit = $kernKwadrantItem['kern_kwaliteit'];
            $kernkwadrant->valkuil = $kernKwadrantItem['valkuil'];
            $kernkwadrant->allergie = $kernKwadrantItem['allergie'];
            $kernkwadrant->uitdaging = $kernKwadrantItem['uitdaging'];
            $kernkwadrant->save();


        }







        return PopResource::make($pop);


    }

    /**
     * Display the specified resource.
     */
    public function show(Pop $pop)
    {
        return PopResource::make($pop);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pop $pop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepopRequest $request, Pop $pop)
    {
        // $pop->update($request->validated());

        $pop->evaluated_by = $request['evaluated_by'];
        $pop->evaluation_finished = $request['evaluation_finished'];
        $pop->save();

        return PopResource::make($pop);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pop $pop)
    {
        $pop->delete();

        return response()->noContent();
    }
}