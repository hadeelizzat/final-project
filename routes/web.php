<?php

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
Route::get('tasks', function () {
    $tasks = DB::table('tasks')->get();
    return view('tasks', compact('tasks'));
});
Route::post('create', function () {
    $task_name = $_POST['name'];
    DB::table('tasks')->insert(['name' => $task_name]);
    return redirect()->back();
});

Route::post('delete/{id}', function ($id) {
    DB::table('tasks')->where('id', $id)->delete();
    return redirect()->back();
});
Route::post('edit/{id}', function ($id) {
    $task = DB::table('tasks')->where('id', $id)->first();
    $tasks = DB::table('tasks')->get();
    return view('tasks', compact('task', 'tasks'));
});
Route::post('update', function () {
    $id = $_POST['id'];
    DB::table('tasks')->where('id', '=', $id)->update(['name' => $_POST['name']]);
    return redirect('tasks');
});
Route::get('users', [userController::class, 'index']);
Route::post('createUser', [userController::class, 'createUser']);
Route::post('deleteUser/{id}', [userController::class, 'deleteUser']);
Route::post('editUser/{id}', [userController::class, 'editUser']);
Route::post('updateUser', [userController::class, 'updateUser']);
