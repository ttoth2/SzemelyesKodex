<?php

namespace App\Http\Controllers;

use App\Models\Ingatlan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class IngatlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ingatlanok = Ingatlan::with('kategoria')->get();

        return response()->json($ingatlanok);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'kategoria' => 'required|exists:kategoriak,id',
            'tehermentes' => 'required',
            'ar' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'hianyos adatok'], 400);
        }
        $ingatlan = Ingatlan::create($request->all());

        return response()->json(['id' => $ingatlan->id], 201);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //

        $ingatlan = Ingatlan::where('id', '=', $id)->first();
        if ($ingatlan == null) {
            return response()->json(['message' => 'Ingatlan nem található'], 404);
        } else {
            $ingatlan->delete();
            return response()->json(['message' => 'Ingatlan sikeresen törölve']);
        }
    }
}
