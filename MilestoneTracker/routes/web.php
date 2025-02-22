<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MilestoneController;

// Public route for homepage
Route::get('/', function () {
    return view('welcome'); // Or just return a message: return 'Welcome to Milestone Tracker!';
});

// Protect milestones routes with authentication
Route::resource('milestones', MilestoneController::class);
