<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProjectionController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/movies', [MovieController::class, 'list']);
Route::get('/movies/{id}', [MovieController::class, 'detail']);
Route::get('/movies/schedule/{id}', [ProjectionController::class, 'movieSchedule']);
Route::get('/movies/schedule/projection/{id}', [ProjectionController::class, 'detail']);
Route::get('/movies/schedule/projection/room/{id}', [RoomController::class, 'detail']);
Route::post('/movies/create', [MovieController::class, 'create']);
Route::post('/reservations/save', [ReservationController::class, 'create']);
Route::get('/tickets/{reservation_id}', [TicketController::class, 'list_reservation_seats']);
Route::get('/tickets', [TicketController::class, 'list']);
Route::get('/reservations', [ReservationController::class, 'list']);
Route::get('/projection_tickets/{projection_id}', [ProjectionController::class, 'projection_tickets']);
Route::get('/reservation_details', [ReservationController::class, 'all_reservations_details']);
Route::get('/rooms', [RoomController::class, 'list']);
Route::post('/projection/create', [ProjectionController::class, 'new_projection']);

