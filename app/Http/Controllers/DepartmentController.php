<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Guide;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('departments.index', compact('departments'));
    }

    public function showJobRoles(Department $department)
{
    $jobRoles = $department->jobRoles;  

    foreach ($jobRoles as $jobRole) {
        $jobRole->guides;  
    }

    return view('job-roles.index', compact('department', 'jobRoles'));
}

    public function show($id)
    {
        $department = Department::with('jobRoles.users')->findOrFail($id);
        return view('departments.show', compact('department'));
    }


    public function create()
    {
        $guides = Guide::all();
        return view('departments.create', compact('guides'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'guide_id' => 'nullable|exists:guides,id',
        ]);

        Department::create([
            'name' => $request->name,
            'guide_id' => $request->guide_id,
        ]);

        return redirect()->route('departments.index');
    }

    public function edit(Department $department)
    {
        $guides = Guide::all();
        return view('departments.edit', compact('department', 'guides'));
    }

    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'guide_id' => 'nullable|exists:guides,id',
        ]);

        $department->update([
            'name' => $request->name,
            'guide_id' => $request->guide_id,
        ]);

        return redirect()->route('departments.index');
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index');
    }
}
