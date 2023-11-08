<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Client;
use App\Models\Package;
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
        return view('admin.dashboard', compact('successFulBookingCount', 'totalEarnings', 'toatlClients', 'packages'));
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
}
