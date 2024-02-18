<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class PreTestController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        for ($i = 1; $i <= 100; $i++)
        {
            if ($i % 3 === 0 && $i % 5 === 0)
            {
                echo "TigaLima "."<br>";
            }
            elseif ($i % 3 === 0)
            {
                echo "Tiga "."<br>";
            }
            elseif ($i % 5 === 0)
            {
                echo "Lima "."<br>";
            }
            else
            {
                echo $i . "<br>";
            }
        }
    }
}
