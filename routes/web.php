<?php

use App\Http\Controllers\taskController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    $name = 'Hadeel';
    $departments = [
        '1' => 'Tichnical',
        '2' => 'Financial',
        '3' => 'sales'
    ];
    //return view(view:'about')->with('name',$name);
    //return view('about',['name'=> $name]);
    return view('about', compact('name', 'departments'));
});
Route::post('/about', function () {
    $name = $_POST['name'];
    $departments = [
        '1' => 'Tichnical',
        '2' => 'Financial',
        '3' => 'sales'
    ];
    return view('about', compact('name', 'departments'));
});

Route::get('tasks', [taskController::class, 'index']);
Route::post('create', [taskController::class, 'create']);
Route::post('delete/{id}', [taskController::class, 'delete']);
Route::get('edit/{id}', [taskController::class, 'edit']);
Route::post('update', [taskController::class, 'update']);
Route::get('users', [userController::class, 'index']);
Route::post('createUser', [userController::class, 'createUser']);
Route::post('deleteUser/{id}', [userController::class, 'deleteUser']);
Route::get('editUser/{id}', [userController::class, 'editUser']);
Route::post('updateUser', [userController::class, 'updateUser']);
