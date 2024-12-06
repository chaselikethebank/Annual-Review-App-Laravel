<?php

namespace App\Http\Controllers;

use App\Models\JobRole;
use Illuminate\Http\Request;

class JobRoleController extends Controller
{
    public function index()
    {
        $jobRoles = JobRole::all();
        return view('job-roles.index', compact('jobRoles'));
    }


    public function create()
    {
        return view('job-roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:225',
        ]);

        JobRole::create([
            'name' => $request->name,
        ]);

        return redirect()->route('job-roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobRole $jobRole)
    {

        return view('job-roles.edit', compact('jobRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobRole $jobRole)
    {
        $request->validate([
            'name' => 'required|string|max:225'
        ]);

        $jobRole->update([
            'name' => $request->name,
        ]);

        return redirect()->route('job-roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobRole $jobRole)
    {
        $jobRole->delete();

        return redirect()->route('job-roles.index');
    }
}
