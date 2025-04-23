<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Project;
use Illuminate\Http\Request;

class EmployeeProjectController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        $projects = Project::all();
        return view('assign', compact('employees', 'projects'));
    }

    public function storeEmployee(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees'
        ]);

        Employee::create($request->only('name', 'email'));
        return back()->with('success', 'Employee added successfully.');
    }

    public function storeProject(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:projects'
        ]);

        Project::create($request->only('name'));
        return back()->with('success', 'Project added successfully.');
    }

    public function assign(Request $request)
    {
        // dd($request);
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'project_ids' => 'required|array',
            'project_ids.*' => 'exists:projects,id',
        ]);

        $employee = Employee::find($request->employee_id);
        $employee->projects()->sync($request->project_ids);

        return back()->with('success', 'Projects assigned to employee.');
    }
}
