<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about',function(){
    $name='Hadeel';
     $departments=[
    '1'=>'Tichnical',
    '2'=>'Financial',
    '3'=>'sales'
 ];
//return view(view:'about')->with('name',$name);
//return view('about',['name'=> $name]);
return view ('about',compact('name','departments'));
});
Route::post('/about',function(){
 $name = $_POST['name'];
 $departments=[
    '1'=>'Tichnical',
    '2'=>'Financial',
    '3'=>'sales'
 ];
 return view('about',compact('name','departments'));
});

