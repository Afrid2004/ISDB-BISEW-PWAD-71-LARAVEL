<?php

use App\Http\Controllers\Invoice;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// new test route 
Route::get("/test", function(){
    // the test.blade.php file 
    return view('test'); 
});

// data is in the Invoice Controller 
Route::get("/invoice", [Invoice::class, "showInvoice"]);
