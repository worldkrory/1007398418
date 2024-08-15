<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Observation;
use App\Models\Winners;
use Faker\Factory as Faker;

class WinnersController
{
    public function index()
    {
        $faker = Faker::create();
        for ($i = 1; $i<1000; $i++){
            $winners = new Winners();
            $winners->name = $faker->name;
            $winners->email = $faker->email;
            $winners->city = $faker->city;
            $winners->country = $faker->name;
            $winners->save();
        }
        
        return response()->json(Winners::all());
        #return response()->json($winners::with('')->get());
        #return response()->json(Winners::with('')->get());
    }

    public function store(Request $request)
    {
        $winners = Winners::create($request->all());
        return response()->json($observation);
    }

    public function update(Request $request, $id)
    {
        $winners = Winners::findOrFail($id);
        $winners->update($request->all());
        return response()->json($winners);
    }

    public function destroy($id)
    {
        Winners::destroy($id);
        return response()->json(['message' => 'Winner deleted']);
    }
}
