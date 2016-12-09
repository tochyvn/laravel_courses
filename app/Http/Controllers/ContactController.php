<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class ContactController extends Controller
{
    public function index() 
    {
    	return view('contact');
    }

    public function post(Request $request) {

    	$time = Carbon::now();
    	$array = ['token' => $request->session()->token(), 'values' => $request->input(), 'time' => $time->getTimestamp()];
    	return array($array);
    }
}
