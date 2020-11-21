<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\BusinessOrderController;
use App\Http\Controllers\CustomerAppointmentsController;
use App\Http\Controllers\CustomerNoteController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\ManualUserController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\SummaryController;
use Illuminate\Support\Facades\Route;
use App\Models\Business;
use App\Models\Customer;
use App\Models\Summary;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/pdf', function () {
    $business = App\Models\Business::find(1);
    $summaries = App\Models\Summary::where([
        ['business_id', '=', $business->id],
        ['date', '>', now()->subYear()],
    ])
    ->get()
    ->map(function($item, $key) {
        $date = new \DateTime($item->date); 
        
        return [
            'id' => $item->id,
            'business_id' => $item->business_id,
            'status_id' => $item->status_id,
            'count' => $item->count,
            'date' => $date->format( 'Y-m' ),
        ];
    })
    ->sortByDesc('date');
    
    // get dates and totals
    $dates = $summaries->groupBy('date')
    ->map(function($summary, $date) {
        return $summary->sum('count');
    })->mapWithKeys(function ($item, $date) {
        return [date('M Y', strtotime($date)) => $item];
    });

    // get summary data grouped by status for looping through table rows
    $summaries = $summaries->groupBy('status_id')->sort()->map(function($item) {
        return $item->sortByDesc('date');
    });

    // status lookup table to rewference name and colors
    $statusTable = App\Models\Status::all()->mapWithKeys(function($status, $key) {
        return [$status->id => ['color' => $status->color, 'name' => $status->name]];
    });

    $data = [
        'business' => $business,
        'dates' => $dates,
        'summaries' => $summaries,
        'status' => $statusTable,
    ];

    $pdf = PDF::loadView('pdf', $data);

    return $pdf->stream();
    return view('pdf');
})->name('pdf');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// businesses
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/businesses', [BusinessController::class, 'index'])->middleware('check_business')->name('business.index');
    Route::get('/businesses/create', [BusinessController::class, 'create'])->middleware('can:create,business')->name('business.create');
    Route::get('/businesses/{business}/edit', [BusinessController::class, 'edit'])->middleware('can:edit,business')->name('business.edit');
    Route::get('/businesses/{business}', [BusinessController::class, 'show'])->middleware('can:view,business')->name('business.show');
    Route::post('/businesses', [BusinessController::class, 'store'])->middleware('can:create,business')->name('business.store');
    Route::put('/businesses/{business}', [BusinessController::class, 'update'])->middleware('can:edit,business')->name('business.update');
    Route::delete('/businesses/{business}', [BusinessController::class, 'destroy'])->middleware('can:delete,business')->name('business.destroy');
});

// customers
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/businesses/{business}/customers', [CustomerController::class, 'index'])->middleware('can:view,business')->name('customer.index');
    Route::get('/businesses/{business}/customers/create', [CustomerController::class, 'create'])->middleware('can:create,customer')->name('customer.create');
    Route::post('/businesses/{business}/customers', [CustomerController::class, 'store'])->middleware('can:create,customer')->name('customer.store');
    Route::get('/customers/{customer}', [CustomerController::class, 'show'])->middleware('can:view,customer')->name('customer.show');
    Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->middleware('can:edit,customer')->name('customer.edit');
    Route::put('/customers/{customer}', [CustomerController::class, 'update'])->middleware('can:edit,customer')->name('customer.update');
    Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->middleware('can:delete,customer')->name('customer.destroy');
});

// summary
Route::middleware(['auth:sanctum', 'verified'])->get('/businesses/{business}/summary', [SummaryController::class, 'index'])->name('summary.index');

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

//Manual user creation
Route::middleware(['auth:sanctum', 'verified'])->post('/createuser', [ManualUserController::class, 'store'])->name('manual_user.store');