<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BookCategory;
use Illuminate\Http\Request;

class CategoryBooksController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        return BookCategory::all();
    }
}
