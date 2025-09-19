<?php
namespace App\Http\Controllers;

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
        
        $names=['soma','koma','róka','tunya'];
        return view('pages.names',compact('names'));
    }
}