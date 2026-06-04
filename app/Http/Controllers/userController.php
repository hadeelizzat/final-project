<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    public function index()
    {

        //$users = DB::table('users')->get();
        $users = User::all();
        return view('users', compact('users'));
    }
    public function createUser(Request $request)
    {
        $request->validate(['name'=>'required|max:10','email'=>'email:rfc,dns']);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        //DB::table('users')->insert(['name' => $user_name, 'email' => $user_email, 'password' => $user_password]);
        $user->save();
        return redirect()->back();
    }
    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        //DB::table('users')->where('id', $id)->delete();
        return redirect()->back();
    }
    public function editUser($id)
    {
        // $user = DB::table('users')->where('id', $id)->first();
        $user = User::find($id);
        //$users = DB::table('users')->get();
        $users = User::all();
        return view('users', compact('user', 'users'));
    }
    public function updateUser(Request $request)
    {
        $request->validate(['name'=>'required|max:10','email'=>'email:rfc,dns']);
        //$id = $_POST['id'];
        $user = User::find($_POST['id']);
        // DB::table('users')->where('id', '=', $id)->update(['name' => $_POST['name'], 'email' => $_POST['email'], 'password' => $_POST['password']]);
        $user->name = $_POST['name'];
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];
        $user->save();
        return redirect('users');
    }
}
