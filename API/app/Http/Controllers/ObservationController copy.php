<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Observation;
use App\Models\Winners;

class ObservationController
{
    public function index()
    {
        return response()->json(Observation::with('category')->get());
    }

    public function store(Request $request)
    {
        $observation = Observation::create($request->all());
        return response()->json($observation);
    }

    public function update(Request $request, $id)
    {
        $observation = Observation::findOrFail($id);
        $observation->update($request->all());
        return response()->json($observation);
    }

    public function destroy($id)
    {
        Observation::destroy($id);
        return response()->json(['message' => 'Observation deleted']);
    }
}
