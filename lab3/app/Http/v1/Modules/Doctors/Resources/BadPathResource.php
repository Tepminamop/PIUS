<?php

namespace App\Http\v1\Modules\Doctors\Resources;

use App\Http\v1\Modules\Doctors\Resources\BaseJsonResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\v1\Modules\Doctors\Controllers\DoctorsController;

/** @mixin \App\Domain\Doctors\Catalog\Models\Doctor */

class BadPathResource extends BaseJsonResource
{
    public function toArray($request)
    {
        return [
            'data' => null,
            'errors' => [
                'code' => '404',
                'message' => 'NOT FOUND',
                'meta' => null,
            ],
            'meta' => [
    
            ]
        ];
    }
}