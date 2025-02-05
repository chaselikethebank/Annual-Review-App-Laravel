<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Behavioral;
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


    public function create($review_id)
    {
        $review = Review::with(['user', 'reviewee', 'jobRole'])->findOrFail($review_id);
    
        // Get guides specific to this job role
        $guides = Guide::where('job_role_id', $review->job_role_id)->get();
    
        // Get org-wide behavioral questions
        $behavioralQuestions = Behavioral::all();
    
        return view('assessments.create', compact('review', 'guides', 'behavioralQuestions'));
    }
    
    
    public function store(Request $request)
    {
        // Validate the input data
        $validated = $request->validate([
            'review_id' => 'required|exists:reviews,id',
            'job_role_id' => 'required|exists:job_roles,id',
            'guides' => 'required|array', // Ensure guides are passed
            'guides.*.rating' => 'required|integer|between:1,5', // Validate ratings for guides
            'guides.*.feedback' => 'nullable|string', // Validate feedback for guides
        ]);
    
        // Store the assessment record
        $assessment = new Assessment();
        $assessment->review_id = $request->review_id;
        $assessment->job_role_id = $request->job_role_id;
        $assessment->guide_feedback = '';
        $assessment->behavioral_feedback = '';
        $assessment->guide_ratings = '';
        $assessment->behavioral_ratings = '';
        
        // Now store the guide ratings and feedback (from behavioral questions)
        foreach ($request->guides as $guideId => $data) {
            if (!empty($data['rating'])) {
                // Concatenate feedback with a newline for readability (to separate feedbacks for each guide)
                $assessment->guide_feedback .= isset($data['feedback']) ? $data['feedback'] . "\n" : "";
                $assessment->behavioral_feedback .= isset($data['behavioral_feedback']) ? $data['behavioral_feedback'] . "\n" : "";
                $assessment->guide_ratings .= $data['rating'] . "\n";
                $assessment->behavioral_ratings .= isset($data['behavioral_rating']) ? $data['behavioral_rating'] . "\n" : "";
            }
        }
    
        // Save the assessment data
        $assessment->save();

        $jobRole = JobRole::findOrFail($assessment->job_role_id);

    
        // Decode the ratings and feedback before passing them to the view
        $guideRatings = explode("\n", rtrim($assessment->guide_ratings, "\n"));
        $guideFeedback = explode("\n", rtrim($assessment->guide_feedback, "\n"));
        $behavioralRatings = explode("\n", rtrim($assessment->behavioral_ratings, "\n"));
        $behavioralFeedback = explode("\n", rtrim($assessment->behavioral_feedback, "\n"));
    
        return view('assessments.show', compact('assessment', 'jobRole', 'guideRatings', 'guideFeedback', 'behavioralRatings', 'behavioralFeedback'));
    }
    
    

    public function edit($assessment_id)
    {
        $assessment = Assessment::with(['review', 'review.guides', 'review.behavioralQuestions'])
                                ->findOrFail($assessment_id);
    
        $guides = Guide::where('job_role_id', $assessment->review->job_role_id)->get();
        
        $behavioralQuestions = Behavioral::all();
        
        return view('assessments.edit', compact('assessment', 'guides', 'behavioralQuestions'));
    }
    

    public function update(Request $request, $assessment_id)
    {
        $validated = $request->validate([
            'guides' => 'required|array',
            'behavioral' => 'required|array',
        ]);
    
        $assessment = Assessment::findOrFail($assessment_id);
        
    
        foreach ($validated['guides'] as $guide_id => $data) {
            $guide = Guide::findOrFail($guide_id);
            $assessment->guides()->updateExistingPivot($guide_id, [
                'rating' => $data['rating'],
                'feedback' => $data['feedback'],
            ]);
        }
    
        foreach ($validated['behavioral'] as $behavioral_id => $data) {
            $behavioral = Behavioral::findOrFail($behavioral_id);
            $assessment->behaviorals()->updateExistingPivot($behavioral_id, [
                'rating' => $data['rating'],
                'response' => $data['response'],
            ]);
        }
    
        return redirect()->route('assessments.show', $assessment_id)->with('status', 'Assessment updated!');
    }
    

     

    public function destroy($id)
    {
        // Delete an assessment
        $assessment = Assessment::findOrFail($id);
        $assessment->delete();

        return redirect()->route('assessments.index')->with('success', 'Assessment deleted successfully!');
    }

    public function show($id)
    {
        // Get the assessment from the database
        $assessment = Assessment::findOrFail($id);
    
        // Get the associated job role
        $jobRole = JobRole::findOrFail($assessment->job_role_id);
    
        // Get the review data
        $review = Review::findOrFail($assessment->review_id);
    
        // Process the guide feedback into structured data
        $guideFeedback = explode("\n", rtrim($assessment->guide_feedback, "\n"));
        $formattedGuideData = [];
        foreach ($guideFeedback as $feedback) {
            $guideParts = explode('|', $feedback);
            if (count($guideParts) >= 5) {
                $formattedGuideData[] = $guideParts;
            } else {
                $formattedGuideData[] = array_pad($guideParts, 5, 'N/A');
            }
        }
    
        // If no guide feedback, set as empty array
        if (empty($formattedGuideData)) {
            $formattedGuideData = [];
        }
    
        // Process the behavioral ratings and feedback
        $behavioralRatings = json_decode($assessment->behavioral_ratings, true) ?? [];
        $behavioralFeedback = json_decode($assessment->behavioral_feedback, true) ?? [];

        // dd($formattedGuideData, $behavioralRatings, $behavioralFeedback);

    
        return view('assessments.show', compact('formattedGuideData', 'assessment', 'jobRole', 'review', 'formattedGuideData', 'behavioralRatings', 'behavioralFeedback'));
    }
            

}
