<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function __invoke(Request $request)
    {
        $categories = Category::orderBy('name')->get();
        return CategoryResource::collection($categories);
    }
}


