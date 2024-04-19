<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VideoController;
use App\Models\Video;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { return Inertia::render('Welcome',[
    'videos' => Video::inRandomOrder()->get(),
]); })->name('home');
Route::get('/delete-video', function () { return Inertia::render('DeleteVideo', [
    'videos' => Video::get(),
]); })->name('deleteVideo');;
Route::post('/video', [VideoController::class, 'store'])->name('video.store');
Route::get('/add-video', function () { return Inertia::render('AddVideo'); })->name('addVideo');;
Route::get('/videos/{id}', [VideoController::class, 'show'])->name('video.show');
Route::delete('/videos/{id}', [VideoController::class, 'destroy'])->name('video.destroy');


require __DIR__.'/auth.php';
