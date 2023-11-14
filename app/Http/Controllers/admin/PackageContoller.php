<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageContoller extends Controller
{
    public function list(?string $category = 'active')
    {
        return view('admin.packages.list', compact('category'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }
    public function edit(string $slug)
    {
        $package = Package::findBySlug($slug);
        if(!$package)
            return redirect(route('admin.packages.list'))->with('error', 'Package not found.');
        return view('admin.packages.edit', compact('package'));
    }
}
