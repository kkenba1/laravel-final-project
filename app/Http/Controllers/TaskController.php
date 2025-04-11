<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    // Show all tasks for the authenticated user
    public function index()
    {
        $tasks = Auth::user()->tasks; // Retrieve tasks associated with the logged-in user
        return view('tasks.index', compact('tasks'));
    }

    // Show form to create a new task
    public function create()
    {
        // Return the view for creating a task
        return view('tasks.create');
    }

    // Store a newly created task in storage
    public function store(Request $request)
    {
        // Validate user inputs
        $request->validate([
            'title' => 'required|string|max:255', // Ensure title is not empty and doesn't exceed max length
        ]);

        try {
            // Create a new task for the authenticated user
            Task::create([
                'title' => $request->title,
                'user_id' => Auth::id(), // Associate the task with the logged-in user
            ]);

            // Flash success message
            Session::flash('success', 'Task created successfully!');
            return redirect()->route('tasks.index'); // Redirect to the tasks list page

        } catch (\Exception $e) {
            // Handle error (optional, depending on your needs)
            Session::flash('error', 'Error creating task. Please try again.');
            return back(); // Return to the previous page
        }
    }

    // Show the form to edit a task
    public function edit($id)
    {
        $task = Task::findOrFail($id); // Find task by id
        if ($task->user_id !== Auth::id()) {
            return redirect()->route('tasks.index')->with('error', 'You can only edit your own tasks!');
        }

        return view('tasks.edit', compact('task'));
    }

    // Update a task in storage
    public function update(Request $request, $id)
    {
        // Validate user inputs
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        try {
            $task = Task::findOrFail($id); // Find task by id
            if ($task->user_id !== Auth::id()) {
                return redirect()->route('tasks.index')->with('error', 'You can only edit your own tasks!');
            }

            $task->update([
                'title' => $request->title,
            ]);

            // Flash success message
            Session::flash('success', 'Task updated successfully!');
            return redirect()->route('tasks.index'); // Redirect to the tasks list page

        } catch (\Exception $e) {
            // Handle error
            Session::flash('error', 'Error updating task. Please try again.');
            return back(); // Return to the previous page
        }
    }

    // Delete a task from storage
    public function destroy($id)
    {
        try {
            $task = Task::findOrFail($id); // Find task by id
            if ($task->user_id !== Auth::id()) {
                return redirect()->route('tasks.index')->with('error', 'You can only delete your own tasks!');
            }

            $task->delete(); // Delete the task

            // Flash success message
            Session::flash('success', 'Task deleted successfully!');
            return redirect()->route('tasks.index'); // Redirect to the tasks list page

        } catch (\Exception $e) {
            // Handle error
            Session::flash('error', 'Error deleting task. Please try again.');
            return back(); // Return to the previous page
        }
    }
}
