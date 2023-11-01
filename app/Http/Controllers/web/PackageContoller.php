<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

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
}
