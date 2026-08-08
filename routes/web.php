<?php

use App\Http\Controllers\Invoice;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

// new test route 
Route::get("/test", function(){
    // the test.blade.php file 
    return view('test'); 
});

// data is in the Invoice Controller 
Route::get("/invoice", [Invoice::class, "showInvoice"]);

// crud route 
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/save', [UserController::class, 'save']);
Route::post('/user/create', [UserController::class, 'create']);
Route::put('/user/edit/{id}', [UserController::class, 'edit']);
Route::delete('/user/delete/{id}', [UserController::class, 'delete']);


// resource route (more efficient)
Route::resource("/roles", RoleController::class);


// deleted students
Route::get('/students/deleted', [StudentController::class, 'deletedStudents'])->name('students.deleted');
// students route 
Route::resource("students", StudentController::class);