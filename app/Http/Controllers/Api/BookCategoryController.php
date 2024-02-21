<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BookCategory;
use Illuminate\Http\Request;
use \App\Exceptions\QueryException;

class BookCategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        return BookCategory::all();
    }

    public function store(Request $request)
    {
        try
        {
            if (BookCategory::where('category_name', $request->category_name)->doesntExist())
            {
                $bookCategory = New BookCategory;
                $bookCategory->category_name = $request->category_name;
                $bookCategory->created_by = $request->created_by;
                $bookCategory->save();

                return response()->json([
                    "message" => "Book Category Added.",
                    "status" => 200
                ], 200);
            }
            else
            {
                return response()->json([
                    "message" => "Book Category is Exist.",
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
            if (BookCategory::where('category_name', $request->category_name)->doesntExist())
            {
                $bookCategory = BookCategory::find($id);
                $bookCategory->category_name = is_null($request->category_name) ? $bookCategory->category_name : $request->category_name;
                $bookCategory->created_by = is_null($request->created_by) ? $bookCategory->created_by : $request->created_by;
                $bookCategory->update();

                return response()->json([
                    "message" => "Book Category Updated.",
                    'status' => 200
                ], 200);
            }
            else
            {
                return response()->json([
                    "message" => "Book Category is Exist.",
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
            if (BookCategory::where('id', $id)->exists())
            {
                $bookCategory = BookCategory::find($id);
                $bookCategory->delete();

                return response()->json([
                    "message" => "Book Category Record Deleted.",
                    'status' => 200
                ], 200);
            }
            else
            {
                return response()->json([
                    "message" => "Book Category not found.",
                    'status' => 404
                ], 404);
            }

        } catch (\Exception $e) {
            throw new QueryException($e->getMessage());
        }
    }
}
