<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePopRequest;
use App\Http\Resources\PopResource;
use App\Models\Task;
use App\Models\CoreQuadrant;
use App\Models\Pop;
use App\Models\Goal;
use App\Models\GoalStep;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PopController extends Controller
{
    public function index()
    {
        return PopResource::collection(Pop::all());
    }

    public function show($id)
    {
        $pop = POP::with(['task', 'goals', 'coreQuadrant'])->find($id)->pluck('goals')->flatten();
        return Inertia::render('VerifyPop', [
            'pop' => $pop,
            'tasks' => $pop->tasks,
            'core_quadrants' => $pop->coreQuadrants,
            'goals' => $pop->goals,
        ]);
    }

    public function edit($id)
    {
        $pop = POP::with(['task', 'goals', 'coreQuadrant'])->find($id);
        return Inertia::render('CreatePop', [
            'databasePop' => $pop,
        ]);
    }

    public function popOverview()
    {
        $pops = POP::with(['task', 'goals', 'user'])->get();
        return Inertia::render('PopOverview', [
            'pops' => $pops,
        ]);
    }

    public function popFinished($id){
        $pop = Pop::find($id);
        $pop->user_finished = true;
        $pop->save();
        return redirect('/pops');
    }

    public function create()
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

        // save core quadrants
        $coreQuadrantData = $request->input('core_quadrant');

        if ($coreQuadrantData) {
            foreach ($coreQuadrantData as $coreQuadrantItem) {
                $coreQuadrant = new CoreQuadrant();
                $coreQuadrant->pop_id = $pop['id'];
                $coreQuadrant->core_quality = $coreQuadrantItem['core_quality'];
                $coreQuadrant->pitfall = $coreQuadrantItem['pitfall'];
                $coreQuadrant->allergy = $coreQuadrantItem['allergy'];
                $coreQuadrant->challenge = $coreQuadrantItem['challenge'];
                $coreQuadrant->save();
            }
        }

        // save goals
        $goalsData = $request->input('goals');

        if ($goalsData) {
            foreach ($goalsData as $goalsItem) {
                $goal = new Goal();
                $goal->pop_id = $pop['id'];
                $goal->goal_type = $goalsItem['goalType'];
                $goal->what = $goalsItem['what'];
                $goal->why = $goalsItem['why'];
                $goal->satisfied = $goalsItem['satisfied'];
                $goal->support = $goalsItem['support'];
                $goal->deadline = date('Y-m-d H:i:s');
                $goal->feedback = $goalsItem['feedback'];

                $stepData = $goalsItem['goalSteps'];

                $goal->save();

                foreach ($stepData as $key => $stepitem) {
                    $goalStep = new GoalStep();
                    $goalStep->goal_id = $goal['id'];
                    $goalStep->step = $key;
                    $goalStep->description = $stepitem['value'];
                    $goalStep->save();
                }
             }        
         }
        return PopResource::make($pop);
    }
}