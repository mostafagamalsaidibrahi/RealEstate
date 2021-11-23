<?php
////////////////////////////////// Main /////////////////////////////
// Route for Getting index view
Route::get('/', "MainController@signUp");
Route::post('/', "MainController@signUp");
// Route For Getting Login View
Route::get('/login', "MainController@login");
Route::post('/login', "MainController@login");
// Route For Logout
Route::get('/logout' , "MainController@logout");
///////////////////////////////// Actor /////////////////////////////
// Rout For Getting Actor View
Route::get('/index' , "ActorController@getIndex");
// Route For Getting add estate View
Route::get('/add' , "ActorController@addEstate");
Route::post('/add' , "ActorController@addEstate");
// Route For Get Finding estate view
Route::get('/find' , "ActorController@findEstate");
// Route For Saving data to session
Route::get('/save' , "ActorController@saveSession");
Route::post('/save' , "ActorController@saveSession");
// Route For get Show Result of Filteration
Route::get('/filter' , "ActorController@filter");
/////////////////////////////////// Admin /////////////////////////////
// Route for get main view of admin
Route::get('/index_admin' , "AdminController@showEstateForAction");
// Route For Getting all estate for accept or reject
Route::get('/show' , "AdminController@showEstateForAction");
// Route For Accept Estate
Route::get('/accept/{id}' , "AdminController@acceptEstate");
Route::post('/accept/{id}' , "AdminController@acceptEstate");
// Route For reject Estate
Route::get('/reject/{id}' , "AdminController@rejectEstate");
Route::post('/reject/{id}' , "AdminController@rejectEstate");
// show all actors for make blcok for any one of them
Route::get('/all_actors' , "AdminController@showActors");
// Route For block Actor
Route::get('/block/{id}' , "AdminController@blockActor");
Route::post('/block/{id}' , "AdminController@blockActor");
