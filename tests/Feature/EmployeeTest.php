<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    /**
     * A basic feature test example.
     */
   public function test_create_employee()
 {
    $response = $this->postJson('/api/employees', [
        'full_name' => 'Nawaz',
        'job_title' => 'Developer',
        'country' => 'India',
        'salary' => 50000
    ]);

    $response->assertStatus(201)
             ->assertJsonFragment(['full_name' => 'Nawaz']);
  }
}
