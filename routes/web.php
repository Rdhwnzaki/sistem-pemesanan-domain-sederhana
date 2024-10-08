<?php

use App\Http\Controllers\DomainController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('homepage');
});

Route::get('/check-domain', [DomainController::class, 'checkDomain']);
Route::get('/configuration', [ConfigurationController::class, 'index']);

Route::post('/invoice', function (Request $request) {
    session([
        'userName' => $request->input('name'), 
        'userEmail' => $request->input('email'), 
        'invoiceNumber' => 'INV-' . time(),
        'selectedDuration' => $request->input('selectedDuration'), 
    ]);
    return redirect()->route('invoice');
})->name('invoice');

Route::get('/invoice', function () {
    return view('invoice'); 
})->name('invoice');

Route::get('/login', function () {
    return view('login');
})->name('login');
