<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function index()
{
    $user = auth()->user();

    if ($user->isAdmin()) {
        // Admins see all assessments
        $assessments = Assessment::all();
    } else {
        // Non-admins only see assessments where they are the reviewer
        $assessments = Assessment::where('reviewer_id', $user->id)->get();
    }

    return view('assessments.index', compact('assessments'));
}

    public function show($id)
    {
        // Show a specific assessment
        $assessment = Assessment::findOrFail($id);
        return view('assessments.show', compact('assessment'));
    }

    public function create()
    {
        // Show form to create a new assessment
        return view('assessments.create');
    }

    public function store(Request $request)
    {
        // Store a new assessment
        $validated = $request->validate([
            'review_id' => 'required|exists:reviews,id',
            'job_role_id' => 'required|exists:job_roles,id',
            'guide_id' => 'required|exists:guides,id',
            'rating' => 'required|in:1,2,3,4,5',
            'feedback' => 'nullable|string|max:1000',
            'additional_notes' => 'nullable|string|max:1000',
            'status' => 'required|boolean',
        ]);

        Assessment::create($validated);

        return redirect()->route('assessments.index')->with('success', 'Assessment created successfully!');
    }

    public function edit($id)
    {
        // Show form to edit an existing assessment
        $assessment = Assessment::findOrFail($id);
        return view('assessments.edit', compact('assessment'));
    }

    public function update(Request $request, $id)
    {
        // Update an existing assessment
        $validated = $request->validate([
            'review_id' => 'required|exists:reviews,id',
            'job_role_id' => 'required|exists:job_roles,id',
            'guide_id' => 'required|exists:guides,id',
            'rating' => 'required|in:1,2,3,4,5',
            'feedback' => 'nullable|string|max:1000',
            'additional_notes' => 'nullable|string|max:1000',
            'status' => 'required|boolean',
        ]);

        $assessment = Assessment::findOrFail($id);
        $assessment->update($validated);

        return redirect()->route('assessments.index')->with('success', 'Assessment updated successfully!');
    }

    public function destroy($id)
    {
        // Delete an assessment
        $assessment = Assessment::findOrFail($id);
        $assessment->delete();

        return redirect()->route('assessments.index')->with('success', 'Assessment deleted successfully!');
    }
}
