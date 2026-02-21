<?php

namespace App\Http\Controllers;

use App\Models\SportsRegistration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /**
     * Show the registration form
     */
    public function showForm()
    {
        $sports = [
            'Football',
            'Basketball',
            'Volleyball',
            'Tennis',
            'Athletics',
            'Swimming',
            'Badminton',
            'Table Tennis',
            'Martial Arts',
            'Cricket'
        ];

        return view('registration.form', compact('sports'));
    }

    /**
     * Store a new registration
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'sport_name' => 'required|string|max:255',
            'age_group' => 'required|string|in:U18,U20,U25,Senior',
            'gender' => 'required|string|in:Male,Female,Other',
            'position' => 'nullable|string|max:255',
            'jersey_number' => 'nullable|string|max:10',
            'phone' => 'nullable|string|max:20',
            'notes' => 'nullable|string|max:1000',
        ]);

        try {
            $registration = SportsRegistration::create([
                'user_id' => null, // No user required for registration
                ...$validated,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Registration successful! We will review and contact you soon.',
                'registration' => $registration,
            ]);
        } catch (\Exception $e) {
            \Log::error('Registration error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Registration failed. Please try again.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get user's registrations
     */
    public function getUserRegistrations()
    {
        $registrations = SportsRegistration::where('user_id', auth()->id() ?? 1)
            ->latest()
            ->get();

        return response()->json($registrations);
    }
}
