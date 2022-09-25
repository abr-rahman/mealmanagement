<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BachelorController extends Controller
{
    public function index(){
        return view('bachelor.index');
    }

}
