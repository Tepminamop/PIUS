<?php

namespace App\Http\v1\Modules\Patients\Requests;

use App\Http\v1\Modules\Patients\Requests\BaseFormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class PatchPatientRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['max:30'],
            'disease' => ['max:30'],
        ];
    }
}
