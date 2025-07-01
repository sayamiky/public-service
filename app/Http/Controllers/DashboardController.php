<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = ServiceCategory::all();
        return view('dashboard', compact('categories'));
    }

    function profile()
    {
        $categories = ServiceCategory::all();
        return view('dashboard', compact('categories'));
    }
}
