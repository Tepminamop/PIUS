<?php

namespace App\Domain\Doctors\Catalog\Actions;

use App\Domain\Doctors\Catalog\Models\Doctor;
use App\Http\v1\Modules\Doctors\Requests\PatchDoctorRequest;

use App\Http\v1\Modules\Doctors\Controllers\DoctorsController;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class GetDoctorAction
{
    public function execute(int $id)
    {
        $doctor = Doctor::findOrFail($id);
        
        return $doctor;
    }
}
