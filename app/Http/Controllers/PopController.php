<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePopRequest;
use App\Http\Resources\PopResource;
use App\Models\Task;
use App\Models\CoreQuadrant;
use App\Models\Pop;
use Inertia\Inertia;

class PopController extends Controller
{
    public function index()
    {
        return PopResource::collection(Pop::all());
    }

    public function new()
    {
        return Inertia::render('CreatePop');
    }

public function store(StorePopRequest $request)
    {
        $pop = Pop::create($request->validated());

        // save tasks
        $task = new Task();
        $task->pop_id = $pop['id'];
        $task->goal = $request->input('task.goal');
        $task->results = $request->input('task.results');
        $task->success = $request->input('task.success');
        $task->manager = $request->input('task.manager');
        $task->report_others = $request->input('task.report_others');
        $task->save();

        // save kernkwadranten
        $coreQuadrantData = $request->input('core_quadrant');

        foreach($coreQuadrantData as $coreQuadrantItem){
            $coreQuadrant = new CoreQuadrant();
            $coreQuadrant->pop_id = $pop['id'];
            $coreQuadrant->core_quality = $coreQuadrantItem['core_quality'];
            $coreQuadrant->pitfall = $coreQuadrantItem['pitfall'];
            $coreQuadrant->allergy = $coreQuadrantItem['allergy'];
            $coreQuadrant->challenge = $coreQuadrantItem['challenge'];
            $coreQuadrant->save();
        }

        return PopResource::make($pop);

    }

    public function show(Pop $pop)
    {
        return PopResource::make($pop);
    }

}

