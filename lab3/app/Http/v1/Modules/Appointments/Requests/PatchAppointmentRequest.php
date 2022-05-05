<?php

namespace App\Http\v1\Modules\Appointments\Requests;

use App\Http\v1\Modules\Appointments\Requests\BaseFormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use App\Domain\Doctors\Catalog\Models\Doctor;
use App\Domain\Doctors\Catalog\Models\Patient;

class PatchAppointmentRequest extends FormRequest
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
