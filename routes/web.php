<?php

use App\Http\Controllers\web\HomeController;
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
Route::get('/packages', function(){ return view('web.packages'); })->name('packages');
Route::get('/contact', function(){ return view('web.contact'); })->name('contact');
Route::get('/single-package', function(){ return view('web.singlepackage'); })->name('singlepackage');

Route::redirect('/admin', 'admin/dashboard');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});
