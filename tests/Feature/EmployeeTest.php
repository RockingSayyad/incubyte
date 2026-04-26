<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Employee;
class EmployeeTest extends TestCase
{
    use RefreshDatabase; // clean DB for every test

    public function test_create_employee()
    {
        $response = $this->postJson('/api/employees', [
            'full_name' => 'Nawaz',
            'job_title' => 'Developer',
            'country' => 'India',
            'salary' => 50000
        ]);

        $response->assertStatus(201)
                 ->assertJsonFragment([
                     'full_name' => 'Nawaz',
                     'job_title' => 'Developer'
                 ]);

        $this->assertDatabaseHas('employees', [
            'full_name' => 'Nawaz',
            'country' => 'India'
        ]);
    }
}