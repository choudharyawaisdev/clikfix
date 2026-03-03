<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Service;
use App\Models\WorkerJob;
use App\Models\User; // Assuming workers are users

class WorkerController extends Controller
{
    public function workerservices($category)
    {
        $services = Service::all();
        $filteredWorkers = User::where('services', 'LIKE', "%$category%")->get();
        return view('workerservices.index', compact('services', 'filteredWorkers', 'category'));
    }

    public function profile_details($id)
    {
        $user = User::findOrFail($id);
        $worker_jobs = WorkerJob::where('user_id', $id)->get();
        
        return view('workerjob.profile_details', compact('user', 'worker_jobs'));
    }

    public function edit_profile()
    {
        $user = auth()->user();
        $services_list = Service::all();
        return view('workerjob.profile_update', compact('user', 'services_list'));
    }

    public function update_profile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'phone_number' => 'nullable|string|max:20',
            'services' => 'nullable|string',
            'description' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->services = $request->services;
        $user->description = $request->description;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture && Storage::disk('public')->exists($user->profile_picture)) {
                Storage::disk('public')->delete($user->profile_picture);
            }
            $user->profile_picture = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}