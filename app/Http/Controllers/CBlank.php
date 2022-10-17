<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CBlank extends Controller
{
    //
    public function index(){
        return view('BlankPage');
    }
}
