<?php

namespace App\Exceptions;

use Exception;

class QueryException extends Exception
{
    public function render($request)
    {
        return response()->json([
            'error' => 'Query Error',
            'message' => $this->getMessage(),
            'status' => 400
        ], 400);
    }
}
