<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Package;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $destinations = Destination::all();
        $packages = Package::where('status', 'published')->get();
        return view('web.home', compact('destinations', 'packages'));
    }
}
