<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;


class StatesController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $states = State::all();

        return response()->json(['data' => $states]);
    }
}
