<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorepopRequest;
use App\Http\Requests\UpdatepopRequest;
use App\Models\pop;
use App\Http\Resources\PopResource;

class PopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PopResource::collection(pop::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorepopRequest $request)
    {
        $pop = Pop::create($request->validated());

        return PopResource::make($pop);


    }

    /**
     * Display the specified resource.
     */
    public function show(pop $pop)
    {
        return PopResource::make($pop);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pop $pop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepopRequest $request, pop $pop)
    {
        $pop->update($request->validated());

        return PopResource::make($pop);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pop $pop)
    {
        //
    }
}
