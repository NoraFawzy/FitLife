<?php

use App\Http\Controllers\ProfileController;
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
    return view('index');
});

Route::get('/loginn', function () {
  return view('/loginn');
});


  Route::get('/subscriptions', function () {
    return view('users.subscriptions');
})->name('subscriptions');


Route::get('/classes-coaches', function () {
    return view('users.classes-coaches');
})->name('classes');


Route::get('/index', function () {
    return view('index');
})->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show'); // Change to show method
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit'); // Ensure you have a separate route for editing
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

use App\Http\Controllers\PlanController;
use App\Http\Controllers\UserController;

// Route group for admin middleware
Route::middleware(['auth', 'admin'])->group(function () {
    // User management routes
    Route::resource('users', UserController::class);
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/admin/users-list', [UserController::class, 'index'])->name('users-list');

    // Plan management routes
    Route::get('/admin/add-plan', [PlanController::class, 'create'])->name('plans.create');
    Route::post('admin/plans-list', [PlanController::class, 'store'])->name('plans.store');
    Route::delete('/plans/{id}', [PlanController::class, 'destroy'])->name('plans.destroy');
    Route::get('/plans/{id}/edit', [PlanController::class, 'edit'])->name('plans.edit');
    Route::put('/plans/{id}', [PlanController::class, 'update'])->name('plans.update');
    Route::get('/admin/admin-panel', function () {
        return view('admin.admin-panel');
    })->name('admin-panel');
    Route::get('admin/plans-list', [PlanController::class, 'indexx'])->name('plans.indexx');
});

// Route to display all plans (no admin restriction)
Route::get('/subscriptions', [PlanController::class, 'index'])->name('plans.index');

//enable subscribing btn
Route::post('/subscribe/{planId}', [PlanController::class, 'subscribe'])->name('subscribe');
