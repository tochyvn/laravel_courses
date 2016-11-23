<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class WelcomeController extends Controller
{
    
    //Cette fonction doit liées a une route dans config/web.php
    public function index() {
    	//Teste si la view 'welcome' existe
    	if (View::exists('welcome')) {
    		return view('welcome');
    	}
    }

    public function lion() 
    {
    	return view('welcome');
    }
}
