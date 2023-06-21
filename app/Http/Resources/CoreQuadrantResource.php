<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CoreQuadrantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'coreQuadrantId' => $this->id,
            'allergy' => $this->allergy,
            'challenge' => $this->challenge,
            'coreQuality' => $this->core_quality,
            'pitfall' => $this->pitfall,
        ];
    }
}
