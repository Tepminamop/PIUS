<?php

namespace App\Domain\Patients\Catalog\Actions;

use App\Domain\Patients\Catalog\Models\Patient;
use App\Http\v1\Modules\Patients\Requests\PatchPatientRequest;

class DeletePatientAction
{
    public function execute(int $id): Patient
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return $patient;
    }
}
