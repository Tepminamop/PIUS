<?php

namespace App\Domain\Appointments\Catalog\Actions;

use App\Domain\Appointments\Catalog\Models\Appointment;
use App\Http\v1\Modules\Appointments\Requests\PatchAppointmentRequest;

class GetAppointmentAction
{
    public function execute(int $id)
    {
        $appointment = Appointment::findOrFail($id);
        return $appointment;
    }
}
