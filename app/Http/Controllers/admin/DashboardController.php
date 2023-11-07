<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
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
        return view('admin.dashboard', compact('successFulBookingCount', 'totalEarnings'));
    }
}
