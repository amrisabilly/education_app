<?php

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

Route::get('/', function () {
    // If user already logged in, redirect to their dashboard
    if (auth()->check()) {
        $user = auth()->user();
        switch ($user->role) {
            case 'guru':
                return redirect()->route('guru.dashboard');
            case 'siswa':
                return redirect()->route('siswa.dashboard');
            case 'orangtua':
                return redirect()->route('orangtua.dashboard');
            case 'admin':
                return redirect('/admin/dashboard');
            default:
                return view('landing.splash.index');
        }
    }

    return view('landing.splash.index');
})->name('home');
