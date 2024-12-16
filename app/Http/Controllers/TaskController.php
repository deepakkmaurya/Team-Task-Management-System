<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Team;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
{
    $this->middleware('permission:manage tasks')->only(['create', 'store', 'edit', 'update', 'destroy']);
}
    
    public function index()
    {
        $tasks = Task::with('team')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $teams = Team::all();
        return view('tasks.create', compact('teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'team_id' => 'required',
            'title' => 'required',
        ]);
        Task::create($request->all());
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $teams = Team::all();
        return view('tasks.edit', compact('task', 'teams'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'team_id' => 'required',
            'title' => 'required',
        ]);
        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
