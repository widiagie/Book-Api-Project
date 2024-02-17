<?php

namespace App\Http\Controllers\Api;

use App\Models\Books;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class BookController extends Controller
{
    public function index()
    {
        $books = Books::all();
        return response()->json($books);
    }

    public function store(Request $request)
    {
        $books = New Books;
        $books->title = $request->title;
        $books->category = $request->category;
        $books->author = $request->author;
        $books->publish_date = $request->publish_date;
        $books->save();

        return response()->json([
            "message" => "Book Added."
        ], 201);
    }

    public function show($id)
    {
        $book = Books::find($id);
        if(!empty($book))
        {
            return response()->json($book);
        }
        else
        {
            return response()->json([
                "message" => "Book not found"
            ], 404);
        }
    }
}
