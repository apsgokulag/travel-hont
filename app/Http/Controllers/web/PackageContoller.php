<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PackageContoller extends Controller
{
    public function packages()
    {
        $packages = Package::where('status', 'published')->get();
        return view('web.packages', compact('packages'));
    }

    public function package(String $slug)
    {
        $package = Package::findBySlug($slug);
        if(!$package){
            return redirect(route('packages'));
        }
        $relatedPackages = Package::where('id','<>',$package->id)->limit(4)->get();
        return view('web.singlepackage', compact('package', 'relatedPackages'));
    }

    public function packageBooking(String $slug)
    {
        $package = Package::findBySlug($slug);
        if(!$package){
            return redirect(route('packages'));
        }
        return view('web.bookPackage', compact('package'));
    }

    public function destinationSearch(Request $request)
    {
        $destText = $request['destination'];
        $packages = Package::where('status', 'published')->where('name', 'like', '%' . $destText . '%')->get();
        return view('web.packages', compact('packages'));
        $package = Package::findBySlug($slug);
        if(!$package){
            return redirect(route('packages'));
        }
        return view('web.bookPackage', compact('package'));
    }
}
