<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get(
    '/',
    [
        'uses' => 'MainController@home',
        'as'   => 'main-home'
    ]
);

// Affiche la liste des taches
$router->get(
    '/taches',
    [
        'uses' => 'TacheController@list',
        'as'   => 'tache-list'
    ]
);

// Affiche une tache avec son ID
$router->get(
    '/taches/{id:[1-9][0-9]*}',
    [
        'uses' => 'TacheController@item',
        'as'   => 'tache-item'
    ]
);



// Creation d'une tache
$router->post(
    '/taches',
    [
        'uses' => 'TacheController@add',
        'as'   => 'tache-create'
    ]
);

$router->put(
    '/taches/{id}',
    [
        'uses' => 'TacheController@overwrite',
        'as'   => 'tache-overwrite'
    ]
);

$router->patch(
    '/taches/{id}',
    [
        'uses' => 'TacheController@update',
        'as'   => 'tache-update'
    ]
);

//Delete une taches
$router->delete(
    '/taches/{id}',
    [
        'uses' => 'TacheController@delete',
        'as'   => 'tache-delete'
    ]
);

// Delete toutes les tache
$router->delete(
    '/taches',
    [
        'uses' => 'TacheController@deleteall',
        'as'   => 'tache-deleteall'
    ]
);
