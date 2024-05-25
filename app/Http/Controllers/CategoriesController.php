<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CategoriesController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $categories = Category::all();

        return response()->json(['data' => $categories]);
    }

}
