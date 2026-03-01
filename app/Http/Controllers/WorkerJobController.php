<?php

namespace App\Http\Controllers;

use App\Models\WorkerJob;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class WorkerJobController extends Controller
{
    public function index()
    {
        $jobs = WorkerJob::with('service')
                    ->latest()
                    ->paginate(10);

        return view('workerjob.index', compact('jobs'));
    }

    public function create(Request $request)
    {
        $services = Service::all(); 
        return view('workerjob.create', compact('services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'service_id' => 'required|exists:services,id',
            'price'       => 'required|numeric|min:0',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('jobs', 'public');
        }

        $validated['slug'] = Str::slug($request->title) . '-' . rand(1000, 9999);

        WorkerJob::create($validated);

        return redirect()->route('worker.jobworker.index')
                        ->with('success', 'Job posted successfully!');
    }

    public function edit($id)
    {
        $job = WorkerJob::findOrFail($id);
        $services = Service::all();

        return view('workerjob.edit', compact('job', 'services'));
    }

    public function update(Request $request, $id)
    {
        $job = WorkerJob::findOrFail($id);

        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'service_id' => 'required|exists:services,id',
            'price'       => 'required|numeric|min:0',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($job->image && Storage::disk('public')->exists($job->image)) {
                Storage::disk('public')->delete($job->image);
            }
            $validated['image'] = $request->file('image')->store('jobs', 'public');
        }

        if ($job->title !== $request->title) {
            $validated['slug'] = Str::slug($request->title) . '-' . $job->id;
        }

        $job->update($validated);

        return redirect()
            ->route('worker.jobworker.index')
            ->with('success', 'Job updated successfully.');
    }

    public function destroy(WorkerJob $job)
    {
        if ($job->image) {
            Storage::disk('public')->delete($job->image);
        }
        
        $job->delete();
        
        return back()->with('success', 'Job deleted successfully.');
    }
}