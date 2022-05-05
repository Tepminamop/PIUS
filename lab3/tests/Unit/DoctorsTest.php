<?php

use App\Models\Doctor;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class);

it('can create a doctor', function () {
    $attributes = Doctor::factory()->raw();
    $response = $this->postJson('/api/v1/doctors', $attributes);
    $response->assertStatus(201);
    $this->assertDatabaseHas('doctors', $attributes);
});

it('can get a doctor', function () {
    $doctor = Doctor::factory()->create();

    $response = $this->getJson("/api/v1/doctors/{$doctor->id}");

    $data = [
        'data' => [
            'id' => $doctor->id,
            'name' => $doctor->name,
            'medical_specialty' => $doctor->medical_specialty,
        ],
        'errors' => [
            
        ],
        'meta' => [

        ]
    ];

    $response->assertStatus(200)->assertJson($data);
});

it('can not get a doctor with 404', function () {
    $response = $this->getJson("/api/v1/doctors/0");

    $response->assertStatus(404);
});

it('can not get a doctor with 400', function () {
    $response = $this->getJson("/api/v1/doctors/ahfgaufgsuya");

    $response->assertStatus(400);
});

it('can put a doctor', function () {
    $doctor = Doctor::factory()->create();
    $updatedDoctor = ['name' => 'Put Doctor'];
    $response = $this->putJson("/api/v1/doctors/{$doctor->id}", $updatedDoctor);
    $response->assertStatus(200);
    $this->assertDatabaseHas('doctors', $updatedDoctor);
});

it('can patch a doctor', function () {
    $doctor = Doctor::factory()->create();
    $updatedDoctor = ['name' => 'Patch Doctor'];
    $response = $this->patchJson("/api/v1/doctors/{$doctor->id}", $updatedDoctor);
    $response->assertStatus(200);
    $this->assertDatabaseHas('doctors', $updatedDoctor);
});

it('can delete a doctor', function () {
    $doctor = Doctor::factory()->create();
    $response = $this->deleteJson("/api/v1/doctors/{$doctor->id}");
    $response->assertStatus(200);
});