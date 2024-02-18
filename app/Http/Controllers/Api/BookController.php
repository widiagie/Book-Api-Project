<?php

namespace App\Http\Controllers\Api;

use App\Models\Books;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Exceptions\QueryException;
use Illuminate\Support\Facades\DB;


class BookController extends Controller
{
    public function index()
    {
        $books = DB::table('books')
            ->join('book_category', 'book_category.id', '=', 'books.category_id')
            ->select('books.*', 'book_category.category_name')
            ->get();

        return response()->json($books);
    }

    public function store(Request $request)
    {
        try
        {
            $books = New Books;
            $books->title = $request->title;
            $books->category_id = $request->category_id;
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
        try
        {
            $book = DB::table('books')
                ->join('book_category', 'book_category.id', '=', 'books.category_id')
                ->select('books.*', 'book_category.category_name')
                ->where(['books.id' => $id])
                ->get();

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
        try
        {
            if (Books::where('id', $id)->exists())
            {
                $book = Books::find($id);
                $book->title = is_null($request->title) ? $book->title : $request->title;
                $book->category_id = is_null($request->category_id) ? $book->category_id : $request->category_id;
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

    public function destroy($id)
    {
        try
        {
            if (Books::where('id', $id)->exists())
            {
                $book = Books::find($id);
                $book->delete();

                return response()->json([
                    "message" => "Book Record Deleted.",
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
