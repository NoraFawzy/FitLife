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

Route::get('/index', function () {
    return view('index');
})->name('index');

Route::get('/loginn', function () {
    return view('loginn'); 
})->name('loginn'); // Give it a name

  Route::get('/subscriptions', function () {
    return view('users.subscriptions');
})->name('subscriptions');


Route::get('/classes-coaches', function () {
    return view('users.classes-coaches');
})->name('classes');



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

//3ndy ana bs
Route::get('/class', function () {
  return view('users.showClasses');
})->name('class.show');

//enable subscribing btn
Route::post('/subscribe/{planId}', [PlanController::class, 'subscribe'])->name('subscribe');
//l7d hna


//elgded

//Coaches Routes

use App\Http\Controllers\CoachController;

Route::resource('coaches', CoachController::class);
Route::get('/admin/coaches-list', [CoachController::class, 'index'])->name('admin.coaches-list');
Route::get('/admin/add-coach', [CoachController::class, 'create'])->name('create_coach');
Route::post('/admin/coaches-list', [CoachController::class, 'store'])->name('coach.store');






use App\Http\Controllers\ClassController;
// Routes for ClassController
Route::get('/admin/classes-list', [ClassController::class, 'index'])->name('classes.index'); // List all classes
Route::get('/admin/add-class', [ClassController::class, 'create'])->name('classes.create'); // Show form for new class
Route::post('/admin/classes-list', [ClassController::class, 'store'])->name('classes.store'); // Store new class
Route::get('/classes/{class}', [ClassController::class, 'show'])->name('classes.show'); // Show a specific class
Route::get('/classes/{class}/edit', [ClassController::class, 'edit'])->name('classes.edit'); // Show form for editing a specific class
Route::put('/classes/{class}', [ClassController::class, 'update'])->name('classes.update'); // Update a specific class
Route::delete('/classes/{class}', [ClassController::class, 'destroy'])->name('classes.destroy'); // Delete a specific class

Route::post('/join-class/{class}', [ClassController::class, 'joinClass'])->name('class.join');



// Route for displaying classes to users
Route::get('/index', [ClassController::class, 'userClasses'])->name('classes.user');
//Userclasses

use App\Http\Controllers\UserClassController;
// Route::get('/user-classes', [UserClassController::class, 'index'])->name('userClasses.index'); // List all user-class associations
// Route::post('/user-classes', [UserClassController::class, 'store'])->name('userClasses.store'); // Enroll a user in a class
// Route::delete('/user-classes/{userClass}', [UserClassController::class, 'destroy'])->name('userClasses.destroy'); // Remove user from a class



//Route::get('/', [ClassController::class, 'subscribeForm'])->name('classes.subscribe');
Route::get('/users/class_sub/{id}', [ClassController::class, 'show'])->name('class_sub');




Route::post('users/class_sub', [UserClassController::class, 'store'])->middleware('auth')->name('user_classes.store');





// contact


use App\Http\Controllers\ContactController;

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


Route::middleware(['auth', 'admin'])->group(function (): void {
    Route::get('/admin/contact', [ContactController::class, 'index'])->name('contacts');
    Route::post('/contacts/{id}/checked', [ContactController::class, 'updateCheckedStatus'])->name('contacts.updateChecked');
    Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
    Route::post('/emails/reply/{id}', [ContactController::class, 'reply'])->name('emails.reply');
    // Example route in web.php
    // Route::post('/emails/check/{id}', [ContactController::class, 'markAsChecked']);
    Route::post('/emails/check/{id}', [ContactController::class, 'markAsChecked'])->name('emails.check');

});


