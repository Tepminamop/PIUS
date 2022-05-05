<?php

namespace App\Domain\Appointments\Catalog\Actions;

use App\Domain\Appointments\Catalog\Models\Appointment;
use App\Http\v1\Modules\Appointments\Requests\PatchAppointmentRequest;

class PatchAppointmentAction
{
    public function execute(int $id, array $fields): Appointment
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update($fields);

        return $appointment;
    }
}
