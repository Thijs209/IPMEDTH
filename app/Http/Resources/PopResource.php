<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PopResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'evaluated_by' => $this->evaluated_by,
            'evaluation_finished' => $this->evaluation_finished,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'evaluation_notes' => EvaluationNoteResource::collection($this->evaluationNotes),
            // TODO Add l
            // 'user' => UserResource::make($this->user),
            // 'tasks' => TaskResource::collection($this->tasks),
            // 'core_quadrants' => CoreQuadrantResource::collection($this->coreQuadrants),
            // 'goals' => GoalResource::collection($this->goals),
            // 'goal_steps' => GoalStepResource::collection($this->goalSteps),
        ];
    }
};