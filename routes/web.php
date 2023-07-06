<?php

use App\Http\Controllers\CoordinatesController;
use App\Http\Controllers\UsersController;
use App\Models\Coordinates;
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
    return view('welcome');
});

Route::resource('/users', UsersController::class)->names('users');

Route::get('/app', function () {
    $coordinates = Coordinates::all();
    return view('app', compact('coordinates'));
})->name('app');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'

])->group(function () {
    Route::get('/dashboard', function () {
        $coordinates = Coordinates::all();
        return view('dashboard', compact('coordinates'));
    })->name('dashboard');
});
