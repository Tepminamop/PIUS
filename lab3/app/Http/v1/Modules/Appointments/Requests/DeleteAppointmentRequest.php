<?php

namespace App\Http\v1\Modules\Appointments\Requests;

use App\Http\v1\Modules\Appointments\Requests\BaseFormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class DeleteAppointmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            
        ];
    }
}
