<?php 
namespace App\Http\Controllers;
class controllerForAdminStuff extends Controller{
    public function count(){
        $a = 1;
        $b = 2;
        $c = $a + $b;
        return view('pages/test')->with('c' , $c);
    }
}