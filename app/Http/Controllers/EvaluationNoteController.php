<?php

namespace App\Http\Controllers;

use App\Models\EvaluationNote;
use Illuminate\Http\Request;
use App\Http\Resources\EvaluationNoteResource;

class EvaluationNoteController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pop_id' => 'bail|required',
        ]);

        $note = new EvaluationNote();
        $note->pop_id = $request['pop_id'];
        if ($request['note_type_id'] != null) {
            $note->evaluation_note_type_id = $request['note_type_id'];
        } else {
            $note->evaluation_note_type_id = 1;
        }
        $note->evaluation_note = $request['note'];
        // $note EvaluationNoteResource::make($note);
        error_log("evaluationNoteController: store fn triggered");
        error_log($note);
        $note->save();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $note = EvaluationNote::find($id);

        return EvaluationNoteResource::make($note);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EvaluationNote $evaluationNote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        EvaluationNote::destroy($id);

        return response()->json([
            'message' => 'note deleted'
        ]);
    }
}