<?php

namespace App\Http\v1\Modules\Doctors\Resources;

use App\Http\v1\Modules\Doctors\Resources\BaseJsonResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\v1\Modules\Doctors\Controllers\DoctorsController;

/** @mixin \App\Domain\Doctors\Catalog\Models\Doctor */

class DoctorsResource extends BaseJsonResource
{
    public function toArray($request)
    {
        return [
            'data' => [
                'id' => $this->id,
                'name' => $this->name,
                'medical_specialty' => $this->medical_specialty,
            ],
            'errors' => [
                
            ],
            'meta' => [
    
            ]
        ];
    }
}