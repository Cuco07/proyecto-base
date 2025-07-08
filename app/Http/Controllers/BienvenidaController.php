<?php

namespace App\Http\Controllers;
 
class BienvenidaController extends Controller
{
    public function welcome()
    {
        return view("welcome");
    }

}