<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\User; // Assuming workers are users

class WorkerController extends Controller
{
    public function workerservices($category)
    {
        $services = Service::all();
        $filteredWorkers = User::where('services', 'LIKE', "%$category%")->get();
        return view('workerservices.index', compact('services', 'filteredWorkers', 'category'));
    }

    public function profile_details()
    {
        return view('workerjob.profile_details');
    }
}