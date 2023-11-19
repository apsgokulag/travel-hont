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
        $packages = Package::where('status', 'published')->simplePaginate(1);
        $packagesCount = Package::where('status', 'published')->count();
        return view('web.packages', compact('packages', 'packagesCount'));
    }

    public function package(String $slug)
    {
        $package = Package::findBySlug($slug);
        if(!$package){
            return redirect(route('packages'));
        }
        $relatedPackages = Package::where('id','<>',$package->id)->limit(4)->get();
        // return response()->json(['user' => $package->client], 200);
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
        $packages = Package::where('status', 'published')->where('name', 'like', '%' . $destText . '%')->simplePaginate(1);
        $packagesCount = Package::where('status', 'published')->where('name', 'like', '%' . $destText . '%')->count();
        return view('web.packages', compact('packages', 'packagesCount'));
    }

    public function packagesFilter(Request $request)
    {        
        $destText = $request['package'];
        $query = Package::where('status', 'published');

        if ($request['package'] != NULL) {
            $query->where('name', 'like', '%' . $request['package'] . '%');
        }

        if (preg_replace('/([^0-9])/i', '', $request['minval']) != NULL && preg_replace('/([^0-9])/i', '', $request['maxval']) != NULL) {
            $minval = preg_replace('/([^0-9])/i', '', $request['minval']);
            $maxval = preg_replace('/([^0-9])/i', '', $request['maxval']);        
            $query->whereHas('price', function($query) use($minval, $maxval){
                $query->whereBetween('adult_amount', [$minval, $maxval]);
            });
        }

        if ($request['check'] != NULL) {
            $ratings = $request['check'];
            $query->whereHas('ratings', function($query) use($ratings){
                $query->whereIn('rating', $ratings);
            });
        }
        else{
            $ratings = array();
        }
        $packagesCount = $query->count();
        $packages = $query->simplePaginate(1)->withQueryString();
        return view('web.packages', compact('packages', 'packagesCount', 'destText', 'minval', 'maxval', 'ratings'));
    }
}
