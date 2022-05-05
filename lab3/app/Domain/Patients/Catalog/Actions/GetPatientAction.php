<?php

namespace App\Domain\Patients\Catalog\Actions;

use App\Domain\Patients\Catalog\Models\Patient;
//use App\Models\Patient;
use App\Http\v1\Modules\Patients\Requests\PatchPatientRequest;

class GetPatientAction
{
    public function execute(int $id)
    {
        $patient = Patient::findOrFail($id);
        
        return $patient;
    }
}
