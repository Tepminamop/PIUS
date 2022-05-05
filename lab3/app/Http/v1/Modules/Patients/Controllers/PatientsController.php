<?php

namespace App\Http\v1\Modules\Patients\Controllers;

use App\Http\v1\Modules\Doctors\Controllers\Controller;
use App\Domain\Patients\Actions\CreatePatientAction;
use App\Domain\Patients\Catalog\Actions\PatchPatientAction;
use App\Domain\Patients\Catalog\Actions\PostPatientAction;
use App\Domain\Patients\Catalog\Actions\GetPatientAction;
use App\Domain\Patients\Catalog\Actions\PutPatientAction;
use App\Domain\Patients\Catalog\Actions\DeletePatientAction;
use App\Http\v1\Modules\Patients\Queries\UsersQuery;
use App\Http\v1\Modules\Patients\Requests\CreatePatientRequest;
use App\Http\v1\Modules\Patients\Requests\PatchPatientRequest;
use App\Http\v1\Modules\Patients\Requests\PutPatientRequest;
use App\Http\v1\Modules\Patients\Requests\PostPatientRequest;
use App\Http\v1\Modules\Patients\Resources\PatientsResource;
use App\Http\v1\Patients\Resources\EmptyResource;
use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Foundation\Http\FormRequest;

class PatientsController extends Controller
{
    public function patch(int $id, PatchPatientRequest $request, PatchPatientAction $action) {
        $patient = new PatientsResource(
            $action->execute($id, $request->validated())
        );

        return response()->json($patient, 200);
    }

    public function get(int $id, GetPatientAction $action) {
        $patient = new PatientsResource($action->execute($id));

        return response()->json($patient, 200);
    }

    public function post(PostPatientRequest $request, PostPatientAction $action) {
        $patient = new PatientsResource(
            $action->execute($request->all())
        );

        return response()->json($patient, 201);
    }
    
    public function delete(int $id, DeletePatientAction $action)
    {
        $patient = new PatientsResource($action->execute($id));
       
        return response()->json($patient, 200);
    }
    
    public function put(int $id, PutPatientRequest $request, PutPatientAction $action) {
        $patient = new PatientsResource(
            $action->execute($id, $request->validated())
        );

        return response()->json($patient, 200);
    }
}
