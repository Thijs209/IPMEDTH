<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use App\Models\Pop;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;
use App\Http\Resources\TaskResource;
use App\Http\Resources\GoalResource;
use App\Http\Resources\CoreQuadrantResource;
use App\Http\Resources\EvaluationNoteResource;

class PopResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    // remove data attribute
    public static $wrap = null;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user' => User::select(['id', 'first_name', 'last_name'])->find($this->user_id),
            'fullName' => User::select(['id', 'first_name', 'last_name'])->find($this->user_id)->first_name . ' ' . User::select(['id', 'first_name', 'last_name'])->find($this->user_id)->last_name,
            'tasks' => TaskResource::make(Pop::find($this->id)->task),
            'goals' => GoalResource::collection(Pop::find($this->id)->goals),
            'coreQuadrants' => CoreQuadrantResource::make(Pop::find($this->id)->coreQuadrants),
            'evaluationNotes' => EvaluationNoteResource::collection(Pop::find($this->id)->evaluationNotes),
            'userFinished' => $this->user_finished,
            'userFinishedAt' => $this->user_finished_at,
            'evaluatedBy' => $this->evaluated_by,
            'evaluationFinished' => $this->evaluation_finished,
            'evaluationFinishedAt' => $this->evaluation_finished_at,
        ];
    }
};