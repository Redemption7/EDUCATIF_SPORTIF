<?php

namespace App\Http\Controllers;

use App\Models\SportsRegistration;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard
     */
    public function dashboard()
    {
        $stats = [
            'total' => SportsRegistration::count(),
            'pending' => SportsRegistration::where('status', 'pending')->count(),
            'approved' => SportsRegistration::where('status', 'approved')->count(),
            'rejected' => SportsRegistration::where('status', 'rejected')->count(),
        ];

        $registrations = SportsRegistration::with('user', 'approvedBy')
            ->latest()
            ->paginate(15);

        return view('admin.dashboard', compact('stats', 'registrations'));
    }

    /**
     * Show registrations by sport
     */
    public function registrationsBySort(Request $request)
    {
        $query = SportsRegistration::with('user', 'approvedBy');

        if ($request->has('sport') && $request->sport) {
            $query->where('sport_name', $request->sport);
        }

        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        if ($request->has('gender') && $request->gender) {
            $query->where('gender', $request->gender);
        }

        $registrations = $query->latest()->paginate(15);
        $sports = SportsRegistration::distinct()->pluck('sport_name');

        return view('admin.registrations', compact('registrations', 'sports'));
    }

    /**
     * Approve a registration
     */
    public function approve($id)
    {
        try {
            $registration = SportsRegistration::findOrFail($id);
            $registration->update([
                'status' => 'approved',
                'approved_at' => now(),
                'approved_by' => auth()->id(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Registration approved successfully!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to approve registration.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Reject a registration
     */
    public function reject(Request $request, $id)
    {
        $request->validate([
            'reason' => 'nullable|string|max:500',
        ]);

        try {
            $registration = SportsRegistration::findOrFail($id);
            $registration->update([
                'status' => 'rejected',
                'notes' => 'Rejected: ' . ($request->reason ?? 'No reason provided'),
                'approved_by' => auth()->id(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Registration rejected.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to reject registration.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Export registrations to CSV
     */
    public function exportCSV(Request $request)
    {
        $query = SportsRegistration::with('user');

        if ($request->has('sport') && $request->sport) {
            $query->where('sport_name', $request->sport);
        }

        $registrations = $query->get();

        $csv = "ID,Name,Email,Sport,Age Group,Gender,Position,Status,Registered At\n";
        foreach ($registrations as $reg) {
            $name = $reg->full_name ?? ($reg->user->name ?? 'N/A');
            $email = $reg->email ?? ($reg->user->email ?? 'N/A');
            $csv .= "{$reg->id},\"{$name}\",{$email},{$reg->sport_name},{$reg->age_group},{$reg->gender},{$reg->position},{$reg->status},{$reg->registered_at}\n";
        }

        return response($csv, 200)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="registrations.csv"');
    }
}
