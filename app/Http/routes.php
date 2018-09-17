<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\User;
use App\Address;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/insert',function(){
    $user = User::find(1);
    $address = new Address(['name'=>'temp address']);
    $user->address()->save($address);
});
Route::get('/update',function(){
    $address = Address::where('user_id',2)->firstOrFail();
    $address->name= 'updated address.';
    $address ->save();

});
Route::get('/read/{id}',function($id){
    $user = User::findOrFail($id);
    return $user->address->name;
});
Route::get('/delete',function(){
    $user = User::whereId(1)->firstOrFail();
   return $user->address()->delete();
});