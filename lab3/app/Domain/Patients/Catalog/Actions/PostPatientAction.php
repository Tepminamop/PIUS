<?php

namespace App\Domain\Patients\Catalog\Actions;

use App\Models\Patient;
use App\Http\v1\Modules\Patients\Requests\PatchPatientRequest;

class PostPatientAction
{
    public function execute(array $fields): Patient
    {
        $patient = Patient::create($fields);

        return $patient;
    }
}
