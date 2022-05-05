<?php

namespace App\Domain\Appointments\Catalog\Actions;

use App\Domain\Appointments\Catalog\Models\Appointment;
use App\Http\v1\Modules\Appointment\Requests\PatchAppointmentRequest;
use DateTime;

class PostAppointmentAction
{
    public function execute(array $fields): Appointment
    {
        $appointment = Appointment::create($fields);

        return $appointment;
    }
}
