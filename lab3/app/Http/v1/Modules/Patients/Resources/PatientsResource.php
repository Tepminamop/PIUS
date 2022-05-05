<?php

namespace App\Http\v1\Modules\Patients\Resources;

use App\Http\v1\Modules\Doctors\Resources\BaseJsonResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\v1\Modules\Patients\Controllers\PatientsController;

/** @mixin \App\Domain\Patients\Catalog\Models\Patient */

class PatientsResource extends BaseJsonResource
{
    public function toArray($request)
    {
        return [
            'data' => [
                'id' => $this->id,
                'name' => $this->name,
                'disease' => $this->disease,
            ],
            'errors' => [
                
            ],
            'meta' => [
    
            ]
        ];
    }
}