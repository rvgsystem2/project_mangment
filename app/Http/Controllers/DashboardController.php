<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Project;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function emp()
    {
        $employees = Employee::with('projects')->get();
        return view('employees.all', compact('employees'));
    }

    public function index()
    {
        $projects = Project::all();
        return view('projects.all', compact('projects'));
    }

    public function employeesProjects()
{
    $employees = Employee::with('projects')->get();
    return view('employees-projects', compact('employees'));
}
}
