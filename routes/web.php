<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Mauvaise pratique pour corriger le tir j'ai créer un controller plus une action par defaut
/*
Route::get('/', function () {
    return view('welcome');
});
*/



/**
*
* MES AJOUTS POUR APPRENDRE LARAVEL
* FRAMEWORK
*
*/

//Mon code code lionel pour test de route ++++ Ajout routes parametrées
Route::get('{n}', function ($n) {
    return "je suis la page de Mr. $n";
})->where('n', '[1-3]');

/*
Route::get('/', ['as' => 'home', function() 
{
	return 'Je suis la page d\'accueil !';
}
]);
*/

//Retour d'une veritable reponse HTTP avec code (503, 200, 404, 403)
Route::get('/tochap', function () {
	//utilisation de la façade response
	return Response::make('je suis la page de tochap yvanov !', 200);

	//utilisation du helper response
	//return response('je suis la page de tochap yvanov !', 200);
});


//Autre manière de créer un route à base de façades
$this->app['router']->get('/tochap', function() { return 'coucou !!!'; });


/************** Les façades sont appelées en static contrairement au helper appelé en reference d'objet **************************************************
**********************************************************************************************************************************************************/


//Retourner une vue avec paramètres
Route::get('article/{n}/{m}', function($n, $m) { 
    return view('vue1')->with(array('numero'=> $n, "nom" => $m)); 
})->where('n', '[0-9]+');


//La methode magique withNumero nous permettra de recupérer la variable $numero = $n dans la vue blade ou php
Route::get('facture/{n}', function($n) { 
    return view('facture')->withNom($n); 
})->where('n', '[a-zA-Z]*');


/************************ Ajout de routes liées à des controleurs*****************************************
*************************                                         ****************************************
*************************                                        *****************************************/
$this->app['router']->get('/', 'WelcomeController@index');
Route::get('/welcome/index', 'WelcomeController@index');

Route::get('article/{n}', 'ArticleController@show')->where('n', '[0-9]+');


Route::get('users', 'UsersController@getInfos');
Route::post('users', 'UsersController@postInfos');
