<?php

namespace App\Http\Controllers\Api;

use App\Models\Books;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Exceptions\QueryException;


class BookController extends Controller
{
    public function index()
    {
        $books = Books::all();
        return response()->json($books);
    }

    public function store(Request $request)
    {
        try {

            $books = New Books;
            $books->title = $request->title;
            $books->category = $request->category;
            $books->author = $request->author;
            $books->publish_date = $request->publish_date;
            $books->save();

            return response()->json([
                "message" => "Book Added.",
                "status" => 200
            ], 200);

        } catch (\Exception $e) {
            throw new QueryException($e->getMessage());
        }
    }

    public function show($id)
    {
        try {

            $book = Books::find($id);
            if (!empty($book))
            {
                return response()->json($book);
            }
            else
            {
                return response()->json([
                    "message" => "Book not found",
                    "status" => 404
                ], 404);
            }

        } catch (\Exception $e) {
            throw new QueryException($e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {

            if (Books::where('id', $id)->exists())
            {
                $book = Books::find($id);
                $book->title = is_null($request->title) ? $book->title : $request->title;
                $book->category = is_null($request->category) ? $book->category : $request->category;
                $book->author = is_null($request->author) ? $book->author : $request->author;
                $book->publish_date = is_null($request->publish_date) ? $book->publish_date : $request->publish_date;
                $book->update();

                return response()->json([
                    "message" => "Book Updated.",
                    'status' => 200
                ], 200);
            }
            else
            {
                return response()->json([
                    "message" => "Book not found.",
                    'status' => 404
                ], 404);
            }

        } catch (\Exception $e) {
            throw new QueryException($e->getMessage());
        }
    }
}
