<?php

namespace App\Http\v1\Modules\Appointments\Resources;

use App\Http\v1\Modules\Doctors\Resources\BaseJsonResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\v1\Modules\Appointments\Controllers\AppointmentsController;

/** @mixin \App\Domain\Appointments\Catalog\Models\Appointment */

class AppointmentsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'data' => [
                'id' => $this->id,
                'doctor_id' => $this->doctor_id,
                'patient_id' => $this->patient_id,
                'appointment_date' => $this->appointment_date,
            ],
            'errors' => [
                
            ],
            'meta' => [
    
            ]
        ];
    }
}