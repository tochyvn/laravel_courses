<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class WelcomeController extends Controller
{
    
    //Cette fonction doit liées a une route dans config/web.php
    public function index() {
    	return view('welcome');
    }

    public function lion() 
    {
    	return view('welcome');
    }
}
