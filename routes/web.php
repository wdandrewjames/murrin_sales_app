<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\BusinessOrderController;
use App\Http\Controllers\CustomerAppointmentsController;
use App\Http\Controllers\CustomerNoteController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\SummaryController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return redirect()->route('business.index');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// businesses
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/businesses', [BusinessController::class, 'index'])->name('business.index');
    Route::get('/businesses/create', [BusinessController::class, 'create'])->name('business.create');
    Route::get('/businesses/{business}/edit', [BusinessController::class, 'edit'])->name('business.edit');
    Route::get('/businesses/{business}', [BusinessController::class, 'show'])->name('business.show');
    Route::post('/businesses', [BusinessController::class, 'store'])->name('business.store');
    Route::put('/businesses/{business}', [BusinessController::class, 'update'])->name('business.update');
    Route::delete('/businesses/{business}', [BusinessController::class, 'destroy'])->name('business.destroy');
});

// customers
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/businesses/{business}/customers', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/businesses/{business}/customers/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/businesses/{business}/customers', [CustomerController::class, 'store'])->name('customer.store');
    Route::get('/customers/{customer}', [CustomerController::class, 'show'])->name('customer.show');
    Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('customer.update');
    Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customer.destroy');
});

// summary
Route::middleware(['auth:sanctum', 'verified'])->get('/summary/{business}', [SummaryController::class, 'index'])->name('summary.index');

// status
Route::middleware(['auth:sanctum', 'verified'])->put('/status/{customer}', [StatusController::class, 'update'])->name('status.update');

// business orders
Route::middleware(['auth:sanctum', 'verified'])->get('/businesses/{business}/orders', [BusinessOrderController::class, 'index'])->name('business.order.index');

Route::middleware(['auth:sanctum', 'verified'])->get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');


// customers orders
Route::middleware(['auth:sanctum', 'verified'])->get('/customers/{customer}/orders/create', [CustomerOrderController::class, 'create'])->name('customers.order.create');
Route::middleware(['auth:sanctum', 'verified'])->post('/customers/{customer}/orders', [CustomerOrderController::class, 'store'])->name('customers.order.store');
Route::middleware(['auth:sanctum', 'verified'])->put('/customers/{customer}/orders/{order}', [CustomerOrderController::class, 'update'])->name('customers.order.update');
Route::middleware(['auth:sanctum', 'verified'])->get('/customers/{customer}/orders/{order}/edit', [CustomerOrderController::class, 'edit'])->name('customers.order.edit');

// customer appointments
Route::middleware(['auth:sanctum', 'verified'])->get('/customers/{customer}/appointments/create', [CustomerAppointmentsController::class, 'create'])->name('customers.appointment.create');
Route::middleware(['auth:sanctum', 'verified'])->post('/customers/{customer}/appointments', [CustomerAppointmentsController::class, 'store'])->name('customers.appointment.store');

// customer notes
Route::middleware(['auth:sanctum', 'verified'])->get('/customers/{customer}/notes', [CustomerNoteController::class, 'index'])->name('customers.note.index');
Route::middleware(['auth:sanctum', 'verified'])->post('/customers/{customer}/notes', [CustomerNoteController::class, 'store'])->name('customers.note.store');