<?php

namespace App\Http\Controllers;

use App\Models\Name;
use App\Models\Family;
use Illuminate\Http\Request;

class TesztController
{
    public function teszt()
    {
        $names = ['soma', 'koma', 'róka', 'tunya'];
        $randomNameKey = array_rand($names);
        $randomName = $names[$randomNameKey];

        return view('pages.teszt', compact('randomName'));
    }

    public function names()
    {

        //$names=['soma','koma','róka','tunya'];
        $names = Name::all();

        //$names=Name::find(1);
        //$names=Name::where('name','Tomo')->first();//elsö ilyent adja meg
        //$names=Name::where('name','Tomo')->get();//összes ilyent adja meg
        //$names=Name::where('id','>',2)->get();//2nél nagyobb id-jüeket adja meg
        //$names=Name::orderBy('name','<>','Tomo')->whereAnd('id','>',1)->orderBy('id','desc')->get();//1nél nagyobb id-jüeket adja meg név szerint csökkenö sorrendben
        return view('pages.names', compact('names'));
    }

    public function namesCreate($family, $name)
    {
        $namerecord = new Name();
        $namerecord->name = $name;

        $namerecord->family_id = $family;
        $namerecord->save();
        return $namerecord->id;
    }
    public function familyCreate($name)
    {
        $familyrecord = new Family();
        $familyrecord->surname = $name;
        $familyrecord->save();

        return $familyrecord->id;
    }

    public function deleteName(Request $request)
    {
        $name = Name::find($request->input('id'));
        $name->delete();
        return "ok";
    }


    /*
    $names = \DB::table('names')
    ->where('name,'<>'Tomo')
    ->whereAnd('id','>',1)
    ->orderBy('id','desc')
    ->get();
    $names = \DB::select('select 
    * from names 
    where <> 'Tomo' And id >1
    order by id desc'
    );
    */

    /*
    function SaveData(Request $request) {}

    function returnObject()
    {
        $obj = new \stdClass();
        $obj->name = "Jani";
        $obj->server = "SZBI-PG";
        return response()->json($obj);
    }
    function returnError()
    {
        return response()->view('error', ['változó' => 'ez egy váktozó értéks'], 404);
    }

    function redirectAway(){
        return redirect('https://szbi-pg.hu')
    }
    */
}
