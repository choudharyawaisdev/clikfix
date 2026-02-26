<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function profile_details()
    {
        return view('worker.profile_details');
    }

    public function worker_list()
    {
        return view('worker.worker_list');
    }
}
