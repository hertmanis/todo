<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    // Display the list of todos
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    // Show the form for creating a new todo
    public function create()
    {
        return view('todos.create');
    }

    // Store a new todo
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        Todo::create(['title' => $request->title]);

        return redirect()->route('todos.index')->with('success', 'Todo created successfully.');
    }

    // Show the form for editing an existing todo
    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    // Update the specified todo
    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $todo->update(['title' => $request->title]);

        return redirect()->route('todos.index')->with('success', 'Todo updated successfully.');
    }

    // Delete the specified todo
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->route('todos.index')->with('success', 'Todo deleted successfully.');
    }

    // Mark the specified todo as complete (AJAX)
    public function complete(Todo $todo)
    {
        $todo->completed = true;
        $todo->save();

        return response()->json(['success' => true]);
    }
}
