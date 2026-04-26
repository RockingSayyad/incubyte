<?php

namespace App\Http\Controllers;
use app\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Employee::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $employee = Employee::create($request->all());
        return response()->json($employee, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function test_get_all_employees()
    {
        Employee::factory()->count(2)->create();

        $response = $this->getJson('/api/employees');

        $response->assertStatus(200);
    }

    public function test_salary_calculation_india()
{
    $employee = Employee::factory()->create([
        'country' => 'India',
        'salary' => 10000
    ]);

    $response = $this->getJson("/api/employees/{$employee->id}/salary");

    $response->assertJson([
        'net_salary' => 9000
    ]);
}

public function salary($id)
{
    $employee = Employee::findOrFail($id);

    $gross = $employee->salary;

    if ($employee->country === 'India') {
        $net = $gross * 0.9;
    } elseif ($employee->country === 'United States') {
        $net = $gross * 0.88;
    } else {
        $net = $gross;
    }

    return response()->json([
        'gross_salary' => $gross,
        'net_salary' => $net
    ]);
}
}
