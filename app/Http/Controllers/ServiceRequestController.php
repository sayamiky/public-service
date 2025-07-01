<?php

namespace App\Http\Controllers;

use App\Models\DocumentRequest;
use App\Models\ServiceRequest;
use GuzzleHttp\Psr7\ServerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all service requests with related user and service data
        $serviceRequests = ServiceRequest::with('user', 'service')->get();

        // Return the view with the service requests
        return view('service.index', compact('serviceRequests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'document.*' => 'nullable|file|max:10240', // max 10MB per file
        ]);

        // Store service request
        $serviceRequest = ServiceRequest::create([
            'request_code' => 'SR-' . strtoupper(uniqid()),
            'service_id' => $request->input('service_id'),
            'user_id' => Auth::user()->id,
            'status' => 'pending',
        ]);

        // Handle multiple file uploads
        if ($request->hasFile('document')) {
            foreach ($request->file('document') as $file) {
                $path = $file->store('documents', 'public');
                DocumentRequest::create([
                    'service_request_id' => $serviceRequest->id,
                    'file_path' => $path,
                    'original_name' => $file->getClientOriginalName(),
                    'user_id' => Auth::user()->id,
                ]);
            }
        }

        return redirect()->route('service-request.index')->with('success', 'Service request created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
