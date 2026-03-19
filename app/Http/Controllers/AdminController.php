<?php

namespace App\Http\Controllers;

use App\Models\SportsRegistration;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard
     */
    public function dashboard(Request $request)
    {
        $stats = [
            'total' => SportsRegistration::count(),
            'pending' => SportsRegistration::where('status', 'pending')->count(),
            'approved' => SportsRegistration::where('status', 'approved')->count(),
            'rejected' => SportsRegistration::where('status', 'rejected')->count(),
        ];

        // Today's registrations
        $stats['today'] = SportsRegistration::whereDate('created_at', Carbon::today())->count();

        // This week's registrations
        $stats['this_week'] = SportsRegistration::where('created_at', '>=', Carbon::now()->startOfWeek())->count();

        // Sport breakdown for chart
        $sportBreakdown = SportsRegistration::selectRaw('sport_name, count(*) as count')
            ->groupBy('sport_name')
            ->orderByDesc('count')
            ->get();

        // Gender breakdown
        $genderBreakdown = SportsRegistration::selectRaw('gender, count(*) as count')
            ->groupBy('gender')
            ->get();

        // Recent registrations (last 7 days trend)
        $weeklyTrend = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $weeklyTrend[] = [
                'date' => $date->format('M d'),
                'day' => $date->format('D'),
                'count' => SportsRegistration::whereDate('created_at', $date)->count(),
            ];
        }

        // Age group breakdown
        $ageBreakdown = SportsRegistration::selectRaw('age_group, count(*) as count')
            ->groupBy('age_group')
            ->orderByDesc('count')
            ->get();

        // Filterable registrations list
        $query = SportsRegistration::with('user', 'approvedBy');

        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }
        if ($request->has('sport') && $request->sport) {
            $query->where('sport_name', $request->sport);
        }

        $registrations = $query->latest()->paginate(10);
        $sports = SportsRegistration::distinct()->pluck('sport_name');

        // Approval rate
        $approvalRate = $stats['total'] > 0
            ? round(($stats['approved'] / $stats['total']) * 100)
            : 0;

        return view('admin.dashboard', compact(
            'stats',
            'registrations',
            'sports',
            'sportBreakdown',
            'genderBreakdown',
            'weeklyTrend',
            'ageBreakdown',
            'approvalRate'
        ));
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
