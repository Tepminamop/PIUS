<?php

namespace App\Domain\Patients\Catalog\Actions;

use App\Domain\Patients\Catalog\Models\Patient;
use App\Http\v1\Modules\Patients\Requests\PatchPatientRequest;

class PutPatientAction
{
    public function execute(int $id, array $fields): Patient
    {
        $patient = Patient::findOrFail($id);
        $patient->update($fields);

        return $patient;
    }
}
