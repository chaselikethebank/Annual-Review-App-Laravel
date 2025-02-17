<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use App\Models\JobRole;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('reviews.index', compact('reviews'));
    }

    public function create()
    {
        $users = User::all();
        $jobRoles = JobRole::all();
        return view('reviews.create', compact('users', 'jobRoles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'reviewee_id' => 'required|exists:users,id',
            'job_role_id' => 'required|exists:job_roles,id',
            'review_type' => 'required|string',
            'calendar_term' => 'nullable|string',
        ]);

        Review::create($request->all());

        return redirect()->route('reviews.index')->with('success', 'Review created successfully.');
    }

    public function show(Review $review)
    {
        return view('reviews.show', compact('review'));
    }

    public function edit(Review $review)
    {
        $users = User::all();
        $jobRoles = JobRole::all();
        return view('reviews.edit', compact('review', 'users', 'jobRoles'));
    }

    public function update(Request $request, Review $review)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'reviewee_id' => 'required|exists:users,id',
            'job_role_id' => 'required|exists:job_roles,id',
            'review_type' => 'required|string',
            'calendar_term' => 'nullable|string',
        ]);

        $review->update($request->all());

        return redirect()->route('reviews.index')->with('success', 'Review updated successfully.');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('reviews.index')->with('success', 'Review deleted successfully.');
    }
}
