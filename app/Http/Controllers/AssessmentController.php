<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Review;
use App\Models\JobRole;
use App\Models\Guide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssessmentController extends Controller
{
        public function index()
    {
        $isAdmin = auth()->user()->isAdmin();

        if ($isAdmin) {
            $reviews = Review::with('user', 'reviewee', 'jobRole')->get();
        } else {
            $reviews = Review::with('user', 'reviewee', 'jobRole')
                            ->where('user_id', auth()->id())
                            ->get();
        }

        $assessments = Assessment::with('jobRole', 'guide')
                                ->where('user_id', auth()->id())
                                ->get();

        return view('assessments.index', compact('reviews', 'assessments'));
    }


    public function show($id)
    {
        $assessment = Assessment::findOrFail($id);
        return view('assessments.show', compact('assessment'));
    }

    public function create($reviewId)
    {
        $review = Review::findOrFail($reviewId);

        $userJobRole = auth()->user()->jobRole;

        if (!$userJobRole) {
            return redirect()->route('home')->with('error', 'No job role assigned to this user.');
        }

        $guides = $userJobRole->guides;

        return view('assessments.create', compact('userJobRole', 'review', 'guides'));
        
    }


    public function store(Request $request)
    {
        // Validate both guide ratings and behavioral question ratings
        $validated = $request->validate([
            // Validation for guides
            'guide_1_rating' => 'required|integer|between:1,5',
            'guide_1_explanation' => 'nullable|string',
            
            'guide_2_rating' => 'required|integer|between:1,5',
            'guide_2_explanation' => 'nullable|string',
            
            'guide_3_rating' => 'required|integer|between:1,5',
            'guide_3_explanation' => 'nullable|string',
            
            'guide_4_rating' => 'required|integer|between:1,5',
            'guide_4_explanation' => 'nullable|string',

            'guide_5_rating' => 'required|integer|between:1,5',
            'guide_5_explanation' => 'nullable|string',
            

            // Validation for behavioral questions
            'behavioral_1_rating' => 'required|integer|between:1,5',
            'behavioral_1_explanation' => 'nullable|string',

            'behavioral_2_rating' => 'required|integer|between:1,5',
            'behavioral_2_explanation' => 'nullable|string',

            'behavioral_3_rating' => 'required|integer|between:1,5',
            'behavioral_3_explanation' => 'nullable|string',

            'behavioral_4_rating' => 'required|integer|between:1,5',
            'behavioral_4_explanation' => 'nullable|string',

            'behavioral_5_rating' => 'required|integer|between:1,5',
            'behavioral_5_explanation' => 'nullable|string',

        ]);

        $assessment = new Assessment();
        $assessment->user_id = auth()->id();
        $assessment->review_id = $request->review_id;  
        $assessment->save();

        // Save the ratings and explanations for each guide question
        foreach ($validated as $key => $value) {
            if (strpos($key, 'guide_') === 0) {
                // Extract guideId from the key (e.g., guide_1_rating)
                $guideId = explode('_', $key)[1]; 
                $assessment->guides()->attach($guideId, [
                    'rating' => $validated["guide_{$guideId}_rating"],
                    'explanation' => $validated["guide_{$guideId}_explanation"],
                ]);
            }

            // Save ratings and explanations for behavioral questions
            if (strpos($key, 'behavioral_') === 0) {
                $questionId = explode('_', $key)[1]; 
                $assessment->behavioralQuestions()->attach($questionId, [
                    'rating' => $validated["behavioral_{$questionId}_rating"],
                    'explanation' => $validated["behavioral_{$questionId}_explanation"],
                ]);
            }
        }

        // Redirect after successful submission
        return redirect()->route('assessment.index')->with('success', 'Assessment submitted successfully.');
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
