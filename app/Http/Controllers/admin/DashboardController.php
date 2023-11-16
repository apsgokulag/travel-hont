<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Client;
use App\Models\Package;
use App\Models\Review;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $successFulBookingCount = Booking::whereHas('latestTransaction', function($query){
            $query->where([
                ['type', 'capture'],
                ['success', true]
            ]);
        })->count();
        $totalEarnings = Booking::whereHas('latestTransaction', function($query){
            $query->where([
                ['type', 'capture'],
                ['success', true]
            ]);
        })->sum('sub_total');
        $toatlClients = Client::count();
        $packages = Package::where('status', 'published')->count();
        $last30daysPackages = Package::where('status', 'published')->where('created_at', '>', now()->subDays(30)->endOfDay())->get();
        $last30daysBookings = Booking::where('created_at', '>', now()->subDays(30)->endOfDay())->get();
        return view('admin.dashboard', compact('successFulBookingCount', 'totalEarnings', 'toatlClients', 'packages', 'last30daysPackages', 'last30daysBookings'));
    }

    public function clients()
    {
        $clients = Client::withCount(['bookings' => function($query){
            $query->whereHas('latestTransaction', function($query){
                $query->where([
                    ['type', 'capture'],
                    ['success', true]
                ]);
            });
        }])->get();
        return view('admin.clients', compact('clients'));
    }

    public function pendingReviews()
    {
        return view('admin.pending-reviews');
    }
}
