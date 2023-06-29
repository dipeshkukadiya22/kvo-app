<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookingController;
use App\Http\Controllers\MembersController;


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

/* Route::get('/', function () {
    return view('welcome');
});

*/

/* Room Booking Route */
Route::get('/', [BookingController::class, 'RoomBooking'])->name('RoomBooking');

/* Room list Route */
Route::get('/room-list', [BookingController::class, 'RoomList'])->name('RoomList');

/* View Members Route */
Route::get('/view-members', [MembersController::class, 'ViewMembers'])->name('ViewMembers');