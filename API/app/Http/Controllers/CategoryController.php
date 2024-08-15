<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Observation;
use App\Models\Winners;

class CategoryController
{
    public function index()
    {
        return response()->json(Category::all());
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());
        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return response()->json($category);
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return response()->json(['message' => 'Category deleted']);
    }
}

