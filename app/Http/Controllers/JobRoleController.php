<?php

namespace App\Http\Controllers;

use App\Models\JobRole;
use App\Models\Guide;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\User;

class JobRoleController extends Controller
{
    public function assign()
    {
        $jobRoles = JobRole::all();
        return view('job-roles.assign', compact('jobRoles'));
    }

    public function create(Department $department)
    {
        return view('job-roles.create', compact('department'));
    }



    public function store(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        JobRole::create([
            'name' => $request->name,
            'department_id' => $department->id,
        ]);
    
        return redirect()->route('departments.job-roles.index', $department->id)
                         ->with('success', 'Job role created successfully.');
    }

    public function storeAssign(Request $request)
    {
        $user = auth()->user();
        $jobRoleId = $request->input('job_role_id');
        $user->jobRoles()->attach($jobRoleId);

        return redirect()->back()->with('success', 'Job role assigned successfully!');
    }

    public function assignUserToJobRole(Request $request, $jobRoleId)
    {
        $jobRole = JobRole::findOrFail($jobRoleId);
        $user = User::findOrFail($request->user_id);
        $jobRole->users()->attach($user);

        return redirect()->route('job-roles.show', $jobRole->id)
                         ->with('success', 'User assigned to job role successfully!');
    }

    public function removeUserFromJobRole(Request $request, $jobRoleId)
    {
        $jobRole = JobRole::findOrFail($jobRoleId);
        $user = User::findOrFail($request->user_id);
        $jobRole->users()->detach($user);

        return redirect()->route('job-roles.show', $jobRole->id)
                         ->with('success', 'User removed from job role successfully!');
    }

    public function addGuide(Request $request, $jobRoleId)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $jobRole = JobRole::findOrFail($jobRoleId);

        $guide = new Guide();
        $guide->title = $validated['title'];
        $guide->content = $validated['content'];
        $guide->job_role_id = $jobRole->id;
        $guide->save();

        return redirect()->route('job-roles.show', $jobRole->id)
                         ->with('success', 'Guide created successfully!');
    }

    public function index(Department $department)
    {
        $jobRoles = $department->jobRoles;
        return view('job-roles.index', compact('jobRoles', 'department'));
    }

    public function show(JobRole $jobRole)
    {
        $department = $jobRole->department;
        return view('job-roles.show', compact('jobRole', 'department'));
    }

    public function editGuide($jobRoleId, $guideId)
    {
        $jobRole = JobRole::findOrFail($jobRoleId);
        $guide = Guide::where('job_role_id', $jobRoleId)->findOrFail($guideId);

        return view('job-roles.guides.edit', compact('jobRole', 'guide'));
    }

    public function updateGuide(Request $request, $jobRoleId, $guideId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $jobRole = JobRole::findOrFail($jobRoleId);
        $guide = Guide::where('job_role_id', $jobRoleId)->findOrFail($guideId);

        $guide->title = $request->input('title');
        $guide->content = $request->input('content');
        $guide->save();

        return redirect()->route('job-roles.show', $jobRole->id)->with('success', 'Guide updated successfully!');
    }

    public function createGuide($jobRoleId)
    {
        $jobRole = JobRole::findOrFail($jobRoleId);
        return view('job-roles.guides.create', compact('jobRole'));
    }

    public function edit(JobRole $jobRole)
    {
        return view('job-roles.edit', compact('jobRole'));
    }

    public function update(Request $request, JobRole $jobRole)
    {
        $request->validate([
            'name' => 'required|string|max:225'
        ]);

        $jobRole->update([
            'name' => $request->name,
        ]);

        return redirect()->route('departments.job-roles.index', $jobRole->department_id);
    }

    public function destroy(JobRole $jobRole)
    {
        $jobRole->delete();

        return redirect()->route('job-roles.index');
    }

    public function showGuide(Guide $guide, Department $department)
    {
        return view('guides.show', compact('guide', 'department'));
    }
 
}
