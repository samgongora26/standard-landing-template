<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
//Controladores de los posts por el publico
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
//Controlador de los posts por el admin
use App\Http\Controllers\Backend\PostController as AdminController;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

//----------PUBLIC--------
//Posts tours
// Route::resource('/tours', PageController::class)
//     ->except('show');
Route::get('/tours', [PageController::class, 'tours'])->name('tours');
Route::get('/tour', [PageController::class, 'tour'])->name('tour');

//Posts servicies
// Route::resource('/servicies', PostController::class)
//     ->except('show');
Route::get('/servicies', [PageController::class, 'tours'])->name('servicies');
Route::get('/service', [PageController::class, 'tour'])->name('service');

//----------ADMIN---------
//CRUD de posts
Route::resource('/posts', AdminController::class)
    ->middleware('auth')
    ->except('show');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
