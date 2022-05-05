<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    protected $model = Appointment::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'doctor_id' => Doctor::inRandomOrder()->first()->id,
            'patient_id' => Patient::inRandomOrder()->first()->id,
            'appointment_date' => date("Y-m-d")
        ];
    }
}
