<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PackageContoller extends Controller
{
    public function packages(?string $category = 'active')
    {
        return view('admin.packages.list', compact('category'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }
}
