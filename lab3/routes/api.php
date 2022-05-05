<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Domain\Doctors\Catalog\Models\Doctor;
use App\Domain\Patient\Catalog\Models\Patient;
use App\Domain\Appointment\Catalog\Models\Appointment;
use App\Http\v1\Modules\Requests\PatchPatientRequest;
use App\Http\v1\Modules\Requests\PatchAppointmentRequest;
use App\Http\v1\Modules\Doctors\Controllers\DoctorsController;
use App\Http\v1\Modules\Doctors\Controllers\EmptyResourceController;
use App\Http\v1\Modules\Patients\Controllers\PatientsController;
use App\Http\v1\Modules\Appointments\Controllers\AppointmentsController;
use App\Http\v1\Modules\Doctors\Requests\PatchDoctorRequest;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('v1/doctors/{id}', [DoctorsController::class, 'get']);
Route::patch('v1/doctors/{id}', [DoctorsController::class, 'patch']);
Route::post('v1/doctors/', [DoctorsController::class, 'post']);
Route::delete('v1/doctors/{id}', [DoctorsController::class, 'delete']);
Route::put('v1/doctors/{id}', [DoctorsController::class, 'put']);

Route::get('v1/appointments/{id}', [AppointmentsController::class, 'get']);
Route::patch('v1/appointments/{id}', [AppointmentsController::class, 'patch']);
Route::post('v1/appointments/', [AppointmentsController::class, 'post']);
Route::delete('v1/appointments/{id}', [AppointmentsController::class, 'delete']);
Route::put('v1/appointments/{id}', [AppointmentsController::class, 'put']);

Route::get('v1/patients/{id}', [PatientsController::class, 'get']);
Route::patch('v1/patients/{id}', [PatientsController::class, 'patch']);
Route::post('v1/patients/', [PatientsController::class, 'post']);
Route::delete('v1/patients/{id}', [PatientsController::class, 'delete']);
Route::put('v1/patients/{id}', [PatientsController::class, 'put']);
