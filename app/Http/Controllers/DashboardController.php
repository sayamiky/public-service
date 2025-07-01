<?php

namespace App\Http\Controllers;

use App\Models\Citizen;
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
        $cit = Citizen::where('nik', auth()->user()->nik)
            ->with('user')
            ->first();
        return view('livewire.profile.update', compact('cit'));
    }

    function update(Request $request)
    {
        $request->validate([
            // Citizen data validation
            'nik' => 'required|string|max:16',
            'full_name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'birth_place' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'religion' => 'required|string|max:50',
            'marital_status' => 'required|string|max:50',
            'occupation' => 'nullable|string|max:100',
            'province' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'district' => 'required|string|max:100',
            'village' => 'required|string|max:100',
        ]);

        $citizen = Citizen::where('nik', dd(auth()->user()->id))->first();
        $citizen->update($request->only([
            'full_name',
            'gender',
            'birth_place',
            'birth_date',
            'religion',
            'marital_status',
            'occupation',
            'province',
            'city',
            'district',
            'village',
        ]));

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
