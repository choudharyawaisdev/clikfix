<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
{
    // Get services that have at least one worker, 
    // and eager load those workers' user details
    $services = \App\Models\Service::has('workerJobs')
        ->with('workerJobs.user')
        ->get();

    return view('index.index', compact('services'));
}
}
