<?php

namespace App\Http\v1\Modules\Appointments\Requests;

use App\Http\v1\Modules\Appointments\Requests\BaseFormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class PutAppointmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'doctor_id' => ['exists:doctors,id'],
            'patient_id' => ['exists:patients,id'],
            'appointment_date' => ['date_format:Y-m-d'],
        ];
    }
}
