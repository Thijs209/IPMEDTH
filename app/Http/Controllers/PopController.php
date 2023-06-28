<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePopRequest;
use App\Http\Resources\PopResource;
use App\Models\Task;
use App\Models\CoreQuadrant;
use App\Models\Pop;
use App\Models\Goal;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PopController extends Controller
{
    public function index()
    {
        return PopResource::collection(Pop::all());
    }

    public function camelCaseKeys($array, $arrayHolder = array()) {
        $camelCaseArray = !empty($arrayHolder) ? $arrayHolder : array();
        foreach ($array as $key => $val) {
            $newKey = @explode('_', $key);
            array_walk($newKey, create_function('&$v', '$v = ucwords($v);'));
            $newKey = @implode('', $newKey);
            $newKey[0] = strtolower($newKey[0]);
            if (!is_array($val)) {
                $camelCaseArray[$newKey] = $val;
            } else {
                $camelCaseArray[$newKey] = $this->camelCaseKeys($val, $camelCaseArray[$newKey]);
            }
        }
        return $camelCaseArray;
    }


    public function show($id)
    {
        // $pop = POP::with(['task', 'goals', 'coreQuadrant'])->find($id)->pluck('goals')->flatten();
        $pop = camelCaseKeys(POP::with(['task', 'goals', 'coreQuadrant'])->find($id)->toArray());
        
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
        $pops = POP::with(['task', 'goals', 'user'])->where('user_id', Auth::user()->id)->get();
        return Inertia::render('PopOverview', [
            'pops' => $pops,
            'user' => Auth::user(),
        ]);
    }

    public function popFinished($id)
    {
        $pop = Pop::find($id);
        $pop->user_finished = true;
        $pop->save();
        return redirect('/pops');
    }

    public function create()
    {
        return Inertia::render('CreatePop',['user' => Auth::user()]);
    }

    public function update()
    {
    }

    public function store(StorePopRequest $request)
    {
        // $validated = $request->validate([
        //     'user_id' => 'required|exists:users, id',
        // ]);

        // $pop = Pop::create($request->validated());
        // $validated = $request->validated(
        //     [
        //         'user_id' => 'required',
        //         'first_name' => 'required',
        //         'last_name' => 'required',
        //     ]
        // );
        if($request->input('id') !== null){
            $pop = Pop::find($request->input('id'));
        } else {
            $pop = Pop::create($request->validated());
        }

        // save tasks
        $task = new Task();
        $task->pop_id = $pop['id'];
        $task->goal = $request->input('task.goal');
        $task->results = $request->input('task.results');
        $task->success = $request->input('task.success');
        $task->manager = $request->input('task.manager');
        $task->report_others = $request->input('task.report_others');
        if($request->input('task.id') !== null){
            \DB::table('tasks')->where('id', $request->input('task.id'))->update($task->toArray());
        } else {
            $task->save();
        }

        // save core quadrants
        $coreQuadrantData = $request->input('core_quadrant');

        if ($coreQuadrantData) {
            foreach ($coreQuadrantData as $coreQuadrantItem) {
                $coreQuadrant = new CoreQuadrant();
                $coreQuadrant->pop_id = $pop['id'];
                $coreQuadrant->core_quality = $coreQuadrantItem['coreQuality'];
                $coreQuadrant->pitfall = $coreQuadrantItem['pitfall'];
                $coreQuadrant->allergy = $coreQuadrantItem['allergy'];
                $coreQuadrant->challenge = $coreQuadrantItem['challenge'];
                if($coreQuadrantItem['id'] !== null){
                    \DB::table('core_quadrants')->where('id', $coreQuadrantItem['id'])->update($coreQuadrant->toArray());
                } else {
                    $coreQuadrant->save();
                }
            }
        }

        // save goalsGoalStep
        $goalsData = $request->input('goals');

        if ($goalsData) {
            foreach ($goalsData as $goalsItem) {
                $goal = new Goal();
                $goal->pop_id = $pop['id'];
                if (array_key_exists('goalType', $goalsItem)) $goal->goal_type = $goalsItem['goalType'];
                if (array_key_exists('what', $goalsItem)) $goal->what = $goalsItem['what'];
                if (array_key_exists('why', $goalsItem)) $goal->why = $goalsItem['why'];
                if (array_key_exists('satisfied', $goalsItem)) $goal->satisfied = $goalsItem['satisfied'];
                if (array_key_exists('support', $goalsItem)) $goal->support = $goalsItem['support'];
                if (array_key_exists('deadline', $goalsItem)) $goal->deadline = date('Y-m-d H:i:s');
                if (array_key_exists('feedback', $feedback)) $goal->feedback = $goalsItem['feedback'];
                
                if($goalsItem['id'] !== null){
                    \DB::table('goals')->where('id', $goalsItem['id'])->update($goal->toArray());
                } else {
                    $goal->save();
                }
                
                if(array_key_exists('goal_steps', $goalsItem)){
                    $stepData = $goalsItem['goalSteps'];
                    foreach ($stepData as $key => $stepitem) {
                        $goalStep = new GoalStep();
                        $goalStep->goal_id = $goal['id'];
                        $goalStep->step = $key;
                        $goalStep->description = $stepitem['value'];
                        if($stepitem['id'] !== null){
                            \DB::table('goal_steps')->where('id', $stepitem['id'])->update($goalStep->toArray());
                        } else {
                            $goalStep->save();
                        }
                    }
                }
            }
        };
        if($request->input('id') !== null){
            $popArray = $pop->toArray();
            unset($popArray['created_at']);
            unset($popArray['updated_at']);
            \DB::table('pops')->where('id', $request->input('id'))->update($pop->toArray());
        } else {
            $pop->save();
        }
    }
}