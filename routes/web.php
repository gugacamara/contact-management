<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\ContactController;

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


// Authentication routes
Route::get('login', function () {
    return view('login');
})->name('login');

Route::post('login', function (Request $request) {
    if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
        return redirect()->intended('/');
    }
    return back()->withInput()->withErrors(['name' => 'Invalid credentials.']);
});

Route::post('logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// CRUD - contacts
Route::get('/', [ContactController::class, 'index'])->name('contacts.index');
Route::resource('contacts', ContactController::class)->except(['index']);