<?php

namespace App\Http\Controllers;

use App\Models\JobRole;
use App\Models\Guide;
use Illuminate\Http\Request;

class JobRoleController extends Controller
{
    /**
     * Store a newly created guide for a job role.
     */
    // app/Http/Controllers/JobRoleController.php

    public function addGuide(Request $request, $jobRoleId)
    {
        // Validate the form data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Find the JobRole by its ID
        $jobRole = JobRole::findOrFail($jobRoleId);

        // Create a new guide and associate it with the job role
        $guide = new Guide();
        $guide->title = $validated['title'];
        $guide->content = $validated['content'];
        $guide->job_role_id = $jobRole->id;
        $guide->save();

        // Redirect back to the job role's guide list or a success page
        return redirect()->route('job-roles.show', $jobRole->id)
            ->with('success', 'Guide created successfully!');
    }

    /**
     * Display the list of job roles.
     */
    public function index()
    {
        $jobRoles = JobRole::all();
        return view('job-roles.index', compact('jobRoles'))->with('header', 'Job Roles');

    }

    /**
     * Show the form for creating a new job role.
     */
    public function create()
    {
        return view('job-roles.create');
    }

    /**
     * Store a newly created job role.
     */
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
     * Display the specified job role along with its guides.
     */
    public function show($jobRole)
    {
        $jobRole = JobRole::with('guides')->findOrFail($jobRole);
        return view('job-roles.show', compact('jobRole'));
    }

    public function editGuide($jobRoleId, $guideId)
    {
        // Fetch the JobRole and Guide
        $jobRole = JobRole::findOrFail($jobRoleId);
        $guide = Guide::where('job_role_id', $jobRoleId)->findOrFail($guideId);
    
        // Return the edit view with the job role and guide
        return view('job-roles.guides.edit', compact('jobRole', 'guide'));
    }
    
    public function updateGuide(Request $request, $jobRoleId, $guideId)
    {
        // Validate the input data
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Find the JobRole and Guide
        $jobRole = JobRole::findOrFail($jobRoleId);
        $guide = Guide::where('job_role_id', $jobRoleId)->findOrFail($guideId);

        // Update the guide
        $guide->title = $request->input('title');
        $guide->content = $request->input('content');
        $guide->save();

        // Redirect to the job role's show page or back to the guides page
        return redirect()->route('job-roles.show', $jobRole->id)->with('success', 'Guide updated successfully!');
    }


    /**
     * Show the form for creating a new guide for a job role.
     */
    public function createGuide($jobRoleId)
    {
        $jobRole = JobRole::findOrFail($jobRoleId);

        return view('job-roles.guides.create', compact('jobRole'));
    }


    /**
     * Show the form for editing the specified job role.
     */
    public function edit(JobRole $jobRole)
    {
        return view('job-roles.edit', compact('jobRole'));
    }

    /**
     * Update the specified job role.
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
     * Remove the specified job role from storage.
     */
    public function destroy(JobRole $jobRole)
    {
        $jobRole->delete();

        return redirect()->route('job-roles.index');
    }
}
