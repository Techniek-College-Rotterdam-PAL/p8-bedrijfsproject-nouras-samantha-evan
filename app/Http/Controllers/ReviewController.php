<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::latest()->get();
        return view('home', compact('reviews'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'content' => $request->content,
            'rating' => $request->rating,
        ]);

        return redirect()->back()->with('status', 'Review succesvol toegevoegd!');
    }

    public function destroy(Review $review)
    {
        if ($review->user_id === Auth::id()) {
            $review->delete();
            return redirect()->back()->with('status', 'Review succesvol verwijderd!');
        }

        return redirect()->back()->with('error', 'Je mag deze review niet verwijderen.');
    }
}


