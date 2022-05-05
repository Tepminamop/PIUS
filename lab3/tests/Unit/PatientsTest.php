<?php

use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class);

it('can create a patient', function () {
    $attributes = Patient::factory()->raw();
    $response = $this->postJson('/api/v1/patients', $attributes);
    $response->assertStatus(201);
    $this->assertDatabaseHas('patients', $attributes);
});

it('can get a patient', function () {
    $patient = Patient::factory()->create();

    $response = $this->getJson("/api/v1/patients/{$patient->id}");

    $data = [
        'data' => [
            'id' => $patient->id,
            'name' => $patient->name,
            'disease' => $patient->disease,
        ],
        'errors' => [
            
        ],
        'meta' => [

        ]
    ];

    $response->assertStatus(200)->assertJson($data);
});

it('can not get a patient', function () {
    $response = $this->getJson("/api/v1/patients/0");

    $response->assertStatus(404);
});

it('can patch a patient', function () {
    $patient = Patient::factory()->create();
    $updatedPatient = ['name' => 'Patch Patient'];
    $response = $this->patchJson("/api/v1/patients/{$patient->id}", $updatedPatient);
    $response->assertStatus(200);
    $this->assertDatabaseHas('patients', $updatedPatient);
});

it('can put a patient', function () {
    $patient = Patient::factory()->create();
    $updatedPatient = ['name' => 'Put Patient'];
    $response = $this->putJson("/api/v1/patients/{$patient->id}", $updatedPatient);
    $response->assertStatus(200);
    $this->assertDatabaseHas('patients', $updatedPatient);
});

it('can delete a patient', function () {
    $patient = Patient::factory()->create();
    $response = $this->deleteJson("/api/v1/patients/{$patient->id}");
    $response->assertStatus(200);
});