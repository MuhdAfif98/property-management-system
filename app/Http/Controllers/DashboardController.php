<?php

namespace App\Http\Controllers;

use App\Models\Lease;
use App\Models\Payment;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch data for key metrics
        $totalProperties = Property::where('user_id', Auth::id())->count();
        $availableProperties = Property::where('user_id', Auth::id())->where('status', 'available')->count();
        $activeLeases = Lease::where('status', 'active')->count();
        $pendingPayments = Payment::where('status', 'pending')->sum('amount');
        $upcomingExpiries = Lease::where('end_date', '>=', now())
            ->where('end_date', '<=', now()->addDays(30))
            ->count();

        // Fetch data for charts
        $monthlyPaymentTrends = Payment::whereYear('payment_date', now()->year)
            ->whereIn('status', ['pending', 'completed'])
            ->get()
            ->groupBy('status')
            ->map(function ($payments) {
                return $payments->sum('amount');
            });

        $propertyStatusDistribution = Property::selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status');

        return Inertia::render('Dashboard', [
            'user' => auth()->user(),
            'totalProperties' => $totalProperties,
            'availableProperties' => $availableProperties,
            'activeLeases' => $activeLeases,
            'pendingPayments' => $pendingPayments,
            'upcomingExpiries' => $upcomingExpiries,
            'monthlyPaymentTrends' => $monthlyPaymentTrends,
            'propertyStatusDistribution' => $propertyStatusDistribution,
        ]);
    }
}
