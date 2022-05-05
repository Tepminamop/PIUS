<?php

namespace App\Domain\Doctors\Catalog\Actions;

use App\Http\v1\Modules\Doctors\Controllers\DoctorsController;
use App\Domain\Doctors\Catalog\Models\Doctor;
use App\Http\v1\Modules\Doctors\Requests\PatchDoctorRequest;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteDoctorAction
{
    public function execute(int $id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return $doctor;
    }
}
