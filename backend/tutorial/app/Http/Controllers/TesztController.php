<?php
namespace App\Http\Controllers;
use App\Models\Name;

class TesztController
{
    public function teszt()
    {
        $names=['soma','koma','róka','tunya'];
        $randomNameKey= array_rand($names);
        $randomName= $names[$randomNameKey];

        return view('pages.teszt',compact('randomName'));
    }

    public function names()
    {
        
        //$names=['soma','koma','róka','tunya'];
        $names=Name::all();

        //$names=Name::find(1);
        //$names=Name::where('name','Tomo')->first();//elsö ilyent adja meg
        //$names=Name::where('name','Tomo')->get();//összes ilyent adja meg
        //$names=Name::where('id','>',2)->get();//2nél nagyobb id-jüeket adja meg
        //$names=Name::orderBy('name','<>','Tomo')->whereAnd('id','>',1)->orderBy('id','desc')->get();//1nél nagyobb id-jüeket adja meg név szerint csökkenö sorrendben
        return view('pages.names',compact('names'));
    }
    
    public function namesCreate($name)
    {
        $namerecord=new Name();
        $namerecord->name=$name;
        $namerecord->save();

        
        return $namerecord->id;
    }

}