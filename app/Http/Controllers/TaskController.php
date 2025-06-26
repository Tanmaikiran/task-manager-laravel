<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks()->get()->groupBy('status');
        return view('dashboard', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        auth()->user()->tasks()->create([
            'title' => $request->title,
        ]);

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        // Only allow the owner to update
        if ($task->user_id == auth()->id()) {
            $task->update([
                'status' => $request->status,
            ]);
        }

        return redirect()->back();
    }
}
