<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Review;
use App\Models\Qualifier;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function create($reviewId)
    {
        $review = Review::findOrFail($reviewId);
        $qualifiers = Qualifier::all();
        return view('answers.create', compact('review', 'qualifiers'));
    }

    public function store(Request $request, $reviewId)
    {
        $request->validate([
            'qualifier_id' => 'required|exists:qualifiers,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $review = Review::findOrFail($reviewId);

        Answer::create([
            'review_id' => $review->id,
            'qualifier_id' => $request->qualifier_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('reviews.show', $review->id)->with('success', 'Answer submitted successfully!');
    }

    public function edit($reviewId, $answerId)
    {
        $review = Review::findOrFail($reviewId);
        $answer = Answer::findOrFail($answerId);
        $qualifiers = Qualifier::all();
        return view('answers.edit', compact('review', 'answer', 'qualifiers'));
    }

    public function update(Request $request, $reviewId, $answerId)
    {
        $request->validate([
            'qualifier_id' => 'required|exists:qualifiers,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $review = Review::findOrFail($reviewId);
        $answer = Answer::findOrFail($answerId);

        $answer->update([
            'qualifier_id' => $request->qualifier_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('reviews.show', $review->id)->with('success', 'Answer updated successfully!');
    }

    public function destroy($reviewId, $answerId)
    {
        $answer = Answer::findOrFail($answerId);
        $answer->delete();

        return redirect()->route('reviews.show', $reviewId)->with('success', 'Answer deleted successfully!');
    }
}
