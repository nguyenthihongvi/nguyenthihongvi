<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function index()
    {
        $reviews = Review::all();
        return $reviews;
    }

 
    public function create()
    {
        return view('reviews.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'create_time' => 'required|date',
            'name' => 'required|string|max:255',
        ]);

        Review::create($validatedData);
        return redirect()->route('reviews.index')->with('success', 'Review created successfully');
    }

  
    public function show($id)
    {
        $review = Review::findOrFail($id);
        return $review;
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);
        return view('reviews.edit', ['review' => $review]);
    }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        $validatedData = $request->validate([
            'create_time' => 'required|date',
            'name' => 'required|string|max:255',
        ]);

        $review->update($validatedData);
        return redirect()->route('reviews.index')->with('success', 'Review updated successfully');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return redirect()->route('reviews.index')->with('success', 'Review deleted successfully');
    }
}
