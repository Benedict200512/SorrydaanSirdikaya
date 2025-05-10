<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\MembershipController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/get-users', [UserController::class, 'getUsers']);
    Route::post('/add-user', [UserController::class, 'addUser']);
    Route::put('/edit-user/{id}', [UserController::class, 'editUser']);
    Route::delete('/delete-user/{id}', [UserController::class, 'deleteUser']);

    Route::get('/get-customers', [CustomerController::class, 'getCustomers']);
    Route::post('/add-customer', [CustomerController::class, 'addCustomer']);
    Route::put('/edit-customer/{id}', [CustomerController::class, 'editCustomer']);
    Route::delete('/delete-customer/{id}', [CustomerController::class, 'deleteCustomer']);

    Route::get('/get-coaches', [CoachController::class, 'getCoaches']);
    Route::post('/add-coach', [CoachController::class, 'addCoach']);
    Route::put('/edit-coach/{id}', [CoachController::class, 'editCoach']);
    Route::delete('/delete-coach/{id}', [CoachController::class, 'deleteCoach']);

    Route::get('/get-workouts', [WorkoutController::class, 'getAll']);
    Route::get('/get-workout/{id}', [WorkoutController::class, 'getById']);
    Route::post('/add-workout', [WorkoutController::class, 'create']);
    Route::put('/edit-workout/{id}', [WorkoutController::class, 'update']);
    Route::delete('/delete-workout/{id}', [WorkoutController::class, 'delete']);

    Route::get('/get-memberships', [MembershipController::class, 'getAll']);
    Route::get('/get-membership/{id}', [MembershipController::class, 'getById']);
    Route::post('/add-membership', [MembershipController::class, 'create']);
    Route::put('/edit-membership/{id}', [MembershipController::class, 'update']);
    Route::delete('/delete-membership/{id}', [MembershipController::class, 'delete']);
    
    Route::post('/logout', [AuthenticationController::class, 'logout']);
});