<?php

namespace App\Http\v1\Modules\Appointments\Controllers;

use App\Http\v1\Modules\Doctors\Controllers\Controller;
use App\Domain\Appointments\Actions\CreateAppointmentAction;
use App\Domain\Appointments\Catalog\Actions\PatchAppointmentAction;
use App\Domain\Appointments\Catalog\Actions\PostAppointmentAction;
use App\Domain\Appointments\Catalog\Actions\PutAppointmentAction;
use App\Domain\Appointments\Catalog\Actions\GetAppointmentAction;
use App\Domain\Appointments\Catalog\Actions\DeleteAppointmentAction;
use App\Http\v1\Modules\Appointments\Queries\UsersQuery;
use App\Http\v1\Modules\Appointments\Requests\CreateAppointmentRequest;
use App\Http\v1\Modules\Appointments\Requests\PatchAppointmentRequest;
use App\Http\v1\Modules\Appointments\Requests\PutAppointmentRequest;
use App\Http\v1\Modules\Appointments\Requests\PostAppointmentRequest;
use App\Http\v1\Modules\Appointments\Resources\AppointmentsResource;
use App\Http\v1\Appointments\Resources\EmptyResource;
use Illuminate\Http\Request;
use App\Domain\Appointments\Catalog\Models\Appointment;
use Illuminate\Foundation\Http\FormRequest;

class AppointmentsController extends Controller
{
    public function patch(int $id, PatchAppointmentRequest $request, PatchAppointmentAction $action) {
        $appointment = new AppointmentsResource(
            $action->execute($id, $request->validated())
        );

        return response()->json($appointment, 200);
    }

    public function get(int $id, GetAppointmentAction $action) {
        $appointment = new AppointmentsResource($action->execute($id));

        return response()->json($appointment, 200);
    }

    public function post(PostAppointmentRequest $request, PostAppointmentAction $action) {
        $appointment = new AppointmentsResource(
            $action->execute($request->all())
        );

        return response()->json($appointment, 201);
    }
    
    public function delete(int $id, DeleteAppointmentAction $action)
    {
        $appointment = new AppointmentsResource($action->execute($id));
       
        return response()->json($appointment, 200);
    }
    
    public function put(int $id, PutAppointmentRequest $request, PutAppointmentAction $action) {
        $appointment = new AppointmentsResource(
            $action->execute($id, $request->validated())
        );

        return response()->json($appointment, 200);
    }
}
