<?php

namespace App\Http\Controllers;

use App\Models\WorkerJob;
use App\Models\Category; // Assuming you have a Category model
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class WorkerJobController extends Controller
{
    /**
     * Display a listing of the jobs.
     */
    public function index()
    {
        $jobs = WorkerJob::latest()->paginate(10); // Using pagination is better for professional apps
        return view('workerjob.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new job.
     */
    public function create(Request $request, $id)
    {
        $categories = Category::all(); 
        return view('workerjob.create',compact('categories'));
    }

    /**
     * Store a newly created job in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'category'    => 'required|string', // Added based on your UI
            'price'       => 'required|numeric|min:0',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('jobs', 'public');
        }

        $validated['slug'] = Str::slug($request->title) . '-' . rand(1000, 9999);

        WorkerJob::create($validated);

        return redirect()->route('worker.jobworker.index')->with('success', 'Job posted successfully!');
    }

    /**
     * Show the form for editing the specified job.
     */
    public function edit(WorkerJob $job)
    {
        $categories = Category::all();
        return view('workerjob.edit', compact('job', 'categories'));
    }

    /**
     * Update the specified job in storage.
     */
    public function update(Request $request, WorkerJob $job)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric|min:0',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($job->image) {
                Storage::disk('public')->delete($job->image);
            }
            $validated['image'] = $request->file('image')->store('jobs', 'public');
        }

        $validated['slug'] = Str::slug($request->title) . '-' . $job->id;

        $job->update($validated);

        return redirect()->route('worker.jobworker.index')->with('success', 'Job updated successfully.');
    }

    /**
     * Remove the specified job from storage.
     */
    public function destroy(WorkerJob $job)
    {
        if ($job->image) {
            Storage::disk('public')->delete($job->image);
        }
        
        $job->delete();
        
        return back()->with('success', 'Job deleted successfully.');
    }
}