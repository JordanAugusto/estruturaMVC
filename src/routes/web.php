<?php

// responsavel por chamar as rotas da aplicaçao:

use App\Core\Core;
use App\Http\Route;

Route::get('/', 'HomeController@index');
Route::get('/users/{id}/show', 'HomeController@show');

Route::post('/create', 'HomeController@create');
Route::put('/update', 'HomeController@update');
Route::delete('/delete', 'HomeController@delete');

Core::dispatch(Route::getRoutes());