<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GoalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'goalId' => $this->id,
            'deadline' => $this->deadline,
            'feedback' => $this->feedback,
            'satisfied' => $this->satisfied,
            'support' => $this->support,
            'what' => $this->what,
            'why' => $this->why,
        ];
    }
}
