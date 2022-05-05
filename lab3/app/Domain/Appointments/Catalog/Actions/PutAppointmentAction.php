<?php

namespace App\Domain\Appointments\Catalog\Actions;

use App\Domain\Appointments\Catalog\Models\Appointment;
use App\Http\v1\Modules\Doctors\Requests\PatchAppointmentRequest;
use DateTime;

class PutAppointmentAction
{
    public function execute(int $id, array $fields): Appointment
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update($fields);

        return $appointment;
    }
}
