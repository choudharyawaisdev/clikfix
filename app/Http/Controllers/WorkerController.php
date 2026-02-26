<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function profile_details(Request $request)
    {
        return view('worker.profile_details');
    }

    public function all_worker_list(Request $request)
    {
        return view('worker.all_worker_list');
    }


    public function worker_list(Request $request)
    {
        return view('worker.worker_list');
    }
}
