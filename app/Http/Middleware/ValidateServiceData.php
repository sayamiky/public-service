<?php

namespace App\Http\Middleware;

use App\Models\Citizen;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateServiceData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $citizen = Citizen::where('nik', $request->user()->id)->first();

        // List of required fields
        $requiredFields = [
            'nik',
            'full_name',
            'gender',
            'birth_place',
            'birth_date',
            'religion',
            'marital_status',
            'occupation',
            'address',
            'province',
            'city',
            'district',
            'village',
        ];

        $isComplete = true;
        if ($citizen) {
            foreach ($requiredFields as $field) {
            if (empty($citizen->$field)) {
                $isComplete = false;
                break;
            }
            }
        } else {
            $isComplete = false;
        }

        if (!$isComplete && !$request->is('profile')) {
            return redirect()->route('profile')->with('error', 'Please complete your profile data.');
        }

        return $next($request);
    }
}
