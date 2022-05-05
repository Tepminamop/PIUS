<?php

namespace App\Domain\Doctors\Catalog\Actions;

use App\Http\v1\Modules\Doctors\Controllers\DoctorsController;
use App\Domain\Doctors\Catalog\Models\Doctor;
use App\Http\v1\Modules\Doctors\Requests\PatchDoctorRequest;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class PostDoctorAction
{
    public function execute(array $fields): Doctor
    {
        $doctor = Doctor::create($fields);
        
        return $doctor;
    }
}
