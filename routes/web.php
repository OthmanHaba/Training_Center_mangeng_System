<?php

use App\Http\Controllers\ProgramController;
use App\Http\Controllers\TraineeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');


})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/about', fn () => Inertia::render('About'))->name('about');

    Route::get('users', [UserController::class, 'index'])->name('users.index');

    Route::get('trainees', [TraineeController::class, 'index'])->name('trainee.index');
    Route::get('trainee/create', [TraineeController::class, 'create'])->name('trainee.create');
    Route::post('trainee/store', [TraineeController::class, 'store'])->name('trainee.store');
    Route::get('trainee/{:id}', [TraineeController::class, 'show'])->name('trainee.show');

    Route::get('programs', [ProgramController::class, 'index'])->name('program.index');
    Route::get('program/create', [ProgramController::class, 'create'])->name('program.create');
    Route::post('program/store', [ProgramController::class, 'store'])->name('program.store');

    Route::post('api/category/store',[ProgramController::class,'storeCategory'])->name('category.post');
    Route::delete('api/category/{id}',[ProgramController::class,'deleteCategory'])->name('category.delete');
    Route::get('api/categories',[ProgramController::class,'getCategories'])->name('category.get');



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');




});



require __DIR__.'/auth.php';
