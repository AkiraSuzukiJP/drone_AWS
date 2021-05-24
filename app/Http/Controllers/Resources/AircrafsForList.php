<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AircraftsForList extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'manufacturer' => $this->manufacturer,
            'name' => $this->name,
            'serialNo' => $this->serialNo,
            'owner' => $this->owner,
            'type' => $this->type,
            'weight' => $this->weight,
            'is_report' => $this->is_report,
        ];
    }
}
