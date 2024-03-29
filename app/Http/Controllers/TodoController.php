<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $tasks = Task::orderBy('completed_at')
        //     ->orderBy('id', 'DESC')
        //     ->get();

        // return view('tasks.index', [
        //     'tasks' => $tasks,
        // ]);
        $tasks = Todo::orderBy('completed_at')
                    ->orderBy('id', 'DESC' )->get();

        return view('todo.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required|min:10',
            
        ]);
        Todo::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect('/')->with('success', 'Todo created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return view('todo.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // return view('todo.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Todo::where('id', $id)->first();

        $task->completed_at = now();
        $task->save();

        return redirect()->back()->with('success', 'Completed this task successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Todo::where('id', $id)->first();

        $task->delete();

        return redirect()->back()->with('success', ' Task deleted successfully done');
    }
}
