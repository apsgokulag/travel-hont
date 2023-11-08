<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController; 
use App\Http\Controllers\admin\PackageContoller as AdminPackageController;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\web\PackageContoller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', function(){ return view('web.about'); })->name('about');
Route::get('/packages',[PackageContoller::class, 'packages'])->name('packages');
Route::get('/packages/{slug}',[PackageContoller::class, 'package'])->name('package');
Route::get('/packages/{slug}/booking',[PackageContoller::class, 'packageBooking'])->name('package.booking');
Route::get('/contact', function(){ return view('web.contact'); })->name('contact');
Route::get('/destination-search',[PackageContoller::class, 'destinationSearch'])->name('web.search.home');
// Route::get('/single-package', function(){ return view('web.singlepackage'); })->name('singlepackage');

Route::redirect('/admin', 'admin/dashboard');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::prefix('/admin/')->group(function(){        
        Route::get('dashboard', [AdminDashboardController::class,'dashboard'])->name('admin.dashboard'); 
        Route::controller(AdminPackageController::class)->group(function (){
            Route::get('packages/create', 'create')->name('admin.packages.create');
            Route::get('packages/{category?}', 'list')->name('admin.packages.list');
            Route::get('packages/{slug}/edit', 'edit')->name('admin.packages.edit');
        });
        Route::get('bookings', function () {
            return view('admin.bookings');
        })->name('admin.bookings');
        Route::get('settings', function () {
            return view('admin.settings');
        })->name('admin.settings');
    });
});
