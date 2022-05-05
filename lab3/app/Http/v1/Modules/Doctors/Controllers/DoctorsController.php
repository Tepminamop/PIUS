<?php

namespace App\Http\v1\Modules\Doctors\Controllers;

use App\Http\v1\Modules\Doctors\Controllers\Controller;
use App\Domain\Doctors\Catalog\Actions\PatchDoctorAction;
use App\Domain\Doctors\Catalog\Actions\PostDoctorAction;
use App\Domain\Doctors\Catalog\Actions\PutDoctorAction;
use App\Domain\Doctors\Catalog\Actions\DeleteDoctorAction;
use App\Domain\Doctors\Catalog\Actions\GetDoctorAction;
use App\Http\v1\Modules\Doctors\Queries\UsersQuery;
use App\Http\v1\Modules\Doctors\Requests\CreateDoctorRequest;
use App\Http\v1\Modules\Doctors\Requests\PatchDoctorRequest;
use App\Http\v1\Modules\Doctors\Requests\GetDoctorRequest;
use App\Http\v1\Modules\Doctors\Requests\PutDoctorRequest;
use App\Http\v1\Modules\Doctors\Requests\PostDoctorRequest;
use App\Http\v1\Modules\Doctors\Resources\DoctorsResource;
use Illuminate\Http\Request;
use App\Domain\Doctors\Catalog\Models\Doctor;
use Exception;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class DoctorsController extends Controller
{
    public function patch(int $id, PatchDoctorRequest $request, PatchDoctorAction $action) {
        $doctor = new DoctorsResource(
            $action->execute($id, $request->validated())
        );

        return response()->json($doctor, 200);
    }

    public function get(int $id, GetDoctorAction $action) {
        $doctor = new DoctorsResource($action->execute($id));

        return response()->json($doctor, 200);
    }

    public function post(PostDoctorRequest $request, PostDoctorAction $action) {
        $doctor = new DoctorsResource(
            $action->execute($request->validated())
        );

        return response()->json($doctor, 201);
    }
    
    public function delete(int $id, DeleteDoctorAction $action)
    {
        $doctor = new DoctorsResource($action->execute($id));
       
        return response()->json($doctor, 200);
    }
    
    public function put(int $id, PutDoctorRequest $request, PutDoctorAction $action) {
        $doctor = new DoctorsResource(
            $action->execute($id, $request->validated())
        );

        return response()->json($doctor, 200);
    }
}
