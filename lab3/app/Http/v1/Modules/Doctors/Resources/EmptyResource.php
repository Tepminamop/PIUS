<?php

namespace App\Http\v1\Modules\Doctors\Resources;

use App\Http\v1\Modules\Doctors\Resources\BaseJsonResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\v1\Modules\Doctors\Controllers\DoctorsController;
use App\Http\v1\Modules\Doctors\Controllers\EmptyResourceController;

/** @mixin \App\Domain\Doctors\Catalog\Models\Doctor */

class EmptyResource extends BaseJsonResource
{
    public function toArray($request)
    {
        return [
            'data' => null,
            'errors' => [
                'code' => EmptyResourceController::$code,
                'message' => EmptyResourceController::$message,
                'meta' => null,
            ],
            'meta' => [
    
            ]
        ];
    }
}