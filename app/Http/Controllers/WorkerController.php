<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WorkerController extends Controller
{
    public function index()
    {
        $workers = Worker::all();
        $fields = Worker::fieldlabels();
        $modelMetadata = [
            'name' => 'Trabajador',
            'routes' => Worker::getGlobalRoutes()
        ];
        return Inertia::render('Workers/Index', [
            'rows' => $workers,
            'fields' => $fields,
            'model' => $modelMetadata
        ]);
    }

    public function create()
    {
        return Inertia::render('Workers/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:workers,email',
            'phone' => 'nullable|string|max:20',
            'role' => 'nullable|string|max:255',
        ]);
        Worker::create($validated);
        return redirect()->route('workers.index');
    }

    public function edit(Worker $worker)
    {
        return Inertia::render('Workers/Edit', ['worker' => $worker]);
    }

    public function update(Request $request, Worker $worker)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:workers,email,' . $worker->id,
            'phone' => 'nullable|string|max:20',
            'role' => 'nullable|string|max:255',
        ]);
        $worker->update($validated);
        return redirect()->route('workers.index');
    }

    public function destroy(Worker $worker)
    {
        $worker->delete();
        return redirect()->route('workers.index');
    }
}
