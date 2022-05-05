<?php

namespace App\Http\v1\Modules\Doctors\Requests;

use App\Http\v1\Modules\Doctors\Requests\BaseFormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class DeleteDoctorRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            
        ];
    }
}
