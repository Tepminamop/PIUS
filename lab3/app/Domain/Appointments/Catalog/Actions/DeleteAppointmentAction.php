<?php

namespace App\Domain\Appointments\Catalog\Actions;

use App\Domain\Appointments\Catalog\Models\Appointment;
use App\Http\v1\Modules\Appointments\Requests\PatchAppointmentRequest;

class DeleteAppointmentAction
{
    public function execute(int $id): Appointment
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        
        return $appointment;
    }
}
