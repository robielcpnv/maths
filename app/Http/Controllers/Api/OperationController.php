<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Operation;

class OperationController extends Controller
{
    public function index()
    {
        $operations = Operation::select('name', 'slug')->get();
        return response()->json([
            'operations' => $operations
        ]);
    }
}
