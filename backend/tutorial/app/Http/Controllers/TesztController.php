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
}