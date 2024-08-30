<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
Route::get('/', function () {
    return view('welcome');
});

// Route:: get('/users',[UserController::class,'loadAllUsers']);
// Route:: get('/add/user',[UserController::class,'loadAddUserForm']);

// Route:: post('/add/user',[UserController::class,'AddUser'])->name('AddUser');  

 

// Route:: get('/delete/{id}',[UserController::class,'deleteUser']);  
         
// Route:: get('/edit/{id}',[UserController::class,'loadEditForm']); 
// Route:: post('/edit/user',[UserController::class,'EditUser'])->name('EditUser');


// Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
// Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
