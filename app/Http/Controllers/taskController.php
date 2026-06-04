<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use function PHPUnit\Framework\equalTo;

class taskController extends Controller
{
    public function index()
    {
        // $tasks = DB::table('tasks')->get();
        $tasks = Task::all();
        return view('tasks', compact('tasks'));
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'min:2|max:5'
        ]);
        $task_name = $_POST['name'];
        // DB::table('tasks')->insert(['name' => $task_name]);
        $task = new Task();
        $task->name = $task_name;
        $task->save();
        return redirect()->back();
    }
    public function delete($id)
    {
        // DB::table('tasks')->where('id', $id)->delete();
        $task = Task::find($id);
        $task->delete();
        return redirect()->back();
    }
    public function edit($id)
    {
        //$task = DB::table('tasks')->where('id', $id)->first();
        $task = Task::find($id);
        //$tasks = DB::table('tasks')->get();
        $tasks = Task::all();
        return view('tasks', compact('task', 'tasks'));
    }
    public function update(Request $request)
    {
        //DB::table('tasks')->where('id', '=', $id)->update(['name' => $_POST['name']]);
        $validation= $request->validate([
            'name' => 'min:2|max:5'
        ]);

        $task = Task::find($_POST['id']);
        $task->name = $_POST['name'];
        $task->save();
        return redirect('tasks');
    }
}
