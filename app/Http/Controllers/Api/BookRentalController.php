<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Exceptions\QueryException;
use App\Models\BookRental;
use Illuminate\Support\Facades\DB;

class BookRentalController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        $rental = DB::table('book_rental')
            ->join('books', 'books.id', '=', 'book_rental.book_id')
            ->leftJoin('book_category', 'book_category.id', '=', 'books.category_id')
            ->join('users', 'users.id', '=', 'book_rental.user_id')
            ->select('books.title','book_category.category_name','books.author','users.name','users.email','book_rental.rent','book_rental.updated_by')
            ->where('book_rental.rent','=','Y')
            ->get();

        return response()->json($rental);
    }

    public function show($id)
    {
        try
        {
            $rental = DB::table('book_rental')
                ->join('books', 'books.id', '=', 'book_rental.book_id')
                ->leftJoin('book_category', 'book_category.id', '=', 'books.category_id')
                ->join('users', 'users.id', '=', 'book_rental.user_id')
                ->select('books.title','book_category.category_name','books.author','users.name','users.email','book_rental.rent','book_rental.updated_by')
                ->where(['books.id' => $id, 'book_rental.rent' => 'Y'])
                ->get();

            if (!empty($rental))
            {
                return response()->json($rental);
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

    public function store(Request $request)
    {
        try
        {
            if (BookRental::where('book_id', $request->book_id)->doesntExist())
            {
                $bookRental = New BookRental;
                $bookRental->user_id = $request->user_id;
                $bookRental->book_id = $request->book_id;
                $bookRental->rent = $request->rent;
                $bookRental->updated_by = $request->updated_by;
                $bookRental->save();

                return response()->json([
                    "message" => "Book Added.",
                    "status" => 200
                ], 200);
            }
            else
            {
                return response()->json([
                    "message" => "Book data is Exist.",
                    'status' => 404
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
            if (BookRental::where('book_id', $id)->exists())
            {
                $bookRental = BookRental::where('book_id', $id)->first();
                $bookRental->user_id = is_null($request->user_id) ? $bookRental->user_id : $request->user_id;
                $bookRental->rent = is_null($request->rent) ? $bookRental->rent : $request->rent;
                $bookRental->updated_by = is_null($request->updated_by) ? $bookRental->updated_by : $request->updated_by;
                $bookRental->update();

                return response()->json([
                    "message" => "Book Rental Updated.",
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
            if (BookRental::where('id', $id)->exists())
            {
                $bookRental = BookRental::find($id);
                $bookRental->delete();

                return response()->json([
                    "message" => "Book Rental Record Deleted.",
                    'status' => 200
                ], 200);
            }
            else
            {
                return response()->json([
                    "message" => "Book Rental not found.",
                    'status' => 404
                ], 404);
            }

        } catch (\Exception $e) {
            throw new QueryException($e->getMessage());
        }
    }
}
