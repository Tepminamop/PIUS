<?php

namespace App\Domain\Doctors\Catalog\Actions;

use App\Http\v1\Modules\Doctors\Controllers\DoctorsController;
use App\Domain\Doctors\Catalog\Models\Doctor;
use App\Http\v1\Modules\Doctors\Requests\PatchDoctorRequest;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class PatchDoctorAction
{
    public function execute(int $id, array $fields): Doctor
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->update($fields);
        
        return $doctor;
    }
}
