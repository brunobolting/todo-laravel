<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Task;

class TaskController extends Controller
{
    public function index()
    {
        // $tasks = Task::where("status", false)->orderBy("id", "desc")->get();
        // $completed_tasks = Task::where("status", true)->get();
        // $tasks = Task::orderBy("id", "desc")->get();
        // return view("welcome", compact("tasks", "completed_tasks"));
        return view('index');
    }

    public function tasks()
    {
        $tasks = Task::orderBy("id", "desc")->get();
        return $tasks;
    }

    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'text' => 'required|max:255',
        // ]);

        // if ($validator->fails()) {
        //     return redirect('/')
        //         ->withInput()
        //         ->with("message", "Campo não pode ser vazio");
        // }

        $input = $request->all();
        $task = new Task();
        $task->text = request("task");
        $task->save();
        echo ("data saved");
        // return Redirect::back()->with("message", "Task has been added");
    }

    public function complete($id)
    {
        $task = Task::find($id);
        $task->status = true;
        $task->save();
        return Redirect::back()->with("message", "Task has been added to completed list");
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return Redirect::back()->with('message', "Task has been deleted");
    }
}
