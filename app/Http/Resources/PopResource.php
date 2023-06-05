<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Pop;

class PopResource extends JsonResource
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = Pop::class;
    /**
     * 
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
        ];
    }
}