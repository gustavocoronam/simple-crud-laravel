<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = $this->getAllTasks();
        return view('tasks.task-index')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Task::create([
                'task' => $request->task,
                'desc' => $request->desc,
            ]);
            return redirect()->route('task.index')->with('success', 'Task saved successfully');
        } catch (\Exception $error) {
            return redirect()->route('task.index')->with('error', 'Task cannot be saved in DB');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task, $id)
    {
        $task = Task::findOrFail($id);
        return redirect()->route('task.index')->with('taskShow', $task);
    }

    private function getAllTasks()
    {
        $tasks = Task::select('id', 'task', 'desc', 'created_at')->orderBy('id', 'desc')->get();
        return $tasks;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task, $id)
    {
        $task = Task::findOrFail($id);
        $tasks = $this->getAllTasks();

        return view('tasks.task-index', compact('task'), compact('tasks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        try {
            $task->task = $request->input('task');
            $task->desc = $request->input('desc');
            $task->save();

            return redirect()->route('task.index')->with('success', 'Task updated successfully');
        } catch (\Exception $error) {
            return redirect()->route('task.index')->with('error', 'Task cannot be updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task, $id)
    {
        $task = Task::findOrFail($id);
        try {
            $task->delete();
            return redirect()->route('task.index')->with('success', 'Task deleted successfully');
        } catch (\Exception $error) {
            return redirect()->route('task.index')->with('error', 'Task cannot be deleted');
        }
    }
}
