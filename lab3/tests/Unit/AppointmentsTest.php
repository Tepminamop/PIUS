<?php

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class);

it('can create an appointment', function () {
    $attributes = Appointment::factory()->raw();
    $response = $this->postJson('/api/v1/appointments', $attributes);
    $response->assertStatus(201);
    $this->assertDatabaseHas('appointments', $attributes);
});

it('can get an appointment', function () {
    $appointment = Appointment::factory()->create();

    $response = $this->getJson("/api/v1/appointments/{$appointment->id}");

    $data = [
        'data' => [
            'id' => $appointment->id,
            'doctor_id' => $appointment->doctor_id,
            'patient_id' => $appointment->patient_id,
            'appointment_date' => $appointment->appointment_date,
        ],
        'errors' => [
            
        ],
        'meta' => [

        ]
    ];

    $response->assertStatus(200)->assertJson($data);
});

it('can not get an appointment', function () {
    $response = $this->getJson("/api/v1/appointments/0");

    $response->assertStatus(404);
});

it('can patch an appointment', function () {
    $appointment = Appointment::factory()->create();
    $updatedAppointment = ['doctor_id' => Doctor::inRandomOrder()->first()->id];
    $response = $this->patchJson("/api/v1/appointments/{$appointment->id}", $updatedAppointment);
    $response->assertStatus(200);
    $this->assertDatabaseHas('appointments', $updatedAppointment);
});


it('can put an appointment', function () {
    $appointment = Appointment::factory()->create();
    $updatedAppointment = ['doctor_id' => Doctor::inRandomOrder()->first()->id];
    $response = $this->putJson("/api/v1/appointments/{$appointment->id}", $updatedAppointment);
    $response->assertStatus(200);
    $this->assertDatabaseHas('appointments', $updatedAppointment);
});

it('can delete an appointment', function () {
    $appointment = Appointment::factory()->create();
    $response = $this->deleteJson("/api/v1/appointments/{$appointment->id}");
    $response->assertStatus(200);
});