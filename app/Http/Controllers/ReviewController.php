<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create(Book $book)
    {
        return view('books.reviews.create', ['book' => $book]);
    }

    public function store(Book $book, Request $request)
    {
        $validate = $request->validate([
            'review' => ['required'],
            'rating' => ['required'],
        ]);

        $book->reviews()->create($validate);

        return redirect()->route('books.show', $book);
    }
}
