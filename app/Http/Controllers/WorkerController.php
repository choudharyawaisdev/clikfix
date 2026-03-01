<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function profile_details(Request $request)
    {
        return view('worker.profile_details');
    }

public function allWorkerCategoryJob(Request $request)
{
    // Fetch all categories to show on page
    $categories = Category::all();

    // Optionally, if a service/category is selected via query parameter
    $selectedCategoryId = $request->query('category_id');

    if($selectedCategoryId) {
        $users = User::where('category_id', $selectedCategoryId)
                     ->whereNotNull('services')
                     ->get();
    } else {
        // Fetch all users with services for listing
        $users = User::whereNotNull('services')->get();
    }

    return view('categoryjob.index', compact('categories', 'users'));
}

}
