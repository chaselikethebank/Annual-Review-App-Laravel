<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use App\Models\JobRole;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $reviews = Review::with(['user', 'reviewee', 'jobRole'])->get();
    
    // dd($reviews);  
    
    return view('reviews.index', compact('reviews'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();   
        $jobRoles = JobRole::all();
    
        return view('reviews.create', compact('users', 'jobRoles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'reviewee_id' => 'required|exists:users,id',
            'job_role_id' => 'required|exists:job_roles,id',
            'review_type' => 'required|in:self_assessment,manager_feedback,peer_feedback,subordinate_feedback,client_feedback,external_feedback,behavioral_feedback',
            'calendar_term' => 'required|string',  
        ]);

        Review::create($request->all());

        return redirect()->route('reviews.index')->with('success', 'Review created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        return view('reviews.show', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        $users = User::all(); // Users to choose from for reviewee
        $jobRoles = JobRole::all();
        return view('reviews.edit', compact('review', 'users', 'jobRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'reviewee_id' => 'required|exists:users,id',
            'job_role_id' => 'required|exists:job_roles,id',
            'review_type' => 'required|in:self_assessment,manager_feedback,peer_feedback,subordinate_feedback,client_feedback,external_feedback,behavioral_feedback',
            'calendar_term' => 'required|string',  
        ]);

        $review->update($request->all());

        return redirect()->route('reviews.index')->with('success', 'Review updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('reviews.index')->with('success', 'Review deleted successfully.');
    }
}
