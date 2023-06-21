<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

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
            'userId' => $this->user_id,
            'userFinished' => $this->user_finished,
            'userFinishedAt' => $this->user_finished_at,
            'evaluatedBy' => $this->evaluated_by,
            'evaluationFinished' => $this->evaluation_finished,
            'evaluationFinishedAt' => $this->evaluation_finished_at,
            // 'evaluation_notes' => EvaluationNoteResource::collection($this->evaluationNotes),
            // TODO Add l
            // 'user' => UserResource::make($this->user),
            // 'tasks' => TaskResource::collection($this->tasks),
            // 'core_quadrants' => CoreQuadrantResource::collection($this->coreQuadrants),
            // 'goals' => GoalResource::collection($this->goals),
            // 'goal_steps' => GoalStepResource::collection($this->goalSteps),
        ];
    }
};