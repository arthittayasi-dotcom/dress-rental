<?php

use Illuminate\Support\Facades\Route;

use App\Models\Dress;

use App\Http\Controllers\ProfileController;


// Customer
use App\Http\Controllers\Customer\RentalController as CustomerRentalController;


// Admin
use App\Http\Controllers\Admin\RentalController as AdminRentalController;
use App\Http\Controllers\Admin\DressController;
use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReturnController;
use App\Http\Controllers\Admin\HistoryController as AdminHistoryController;


// Owner
use App\Http\Controllers\Owner\ReportController;
use App\Http\Controllers\Owner\UserController;
use App\Http\Controllers\Owner\PdfReportController;
use App\Http\Controllers\Owner\HistoryController as OwnerHistoryController;
use App\Http\Controllers\Owner\DashboardController as OwnerDashboardController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth','role:customer'])
->prefix('customer')
->name('customer.')
->group(function(){


    Route::get('/home', function () {


    $dresses = Dress::where('status','available')
    ->orderByRaw('CAST(SUBSTRING(code, 3) AS UNSIGNED) ASC')
    ->paginate(8);



    return view(
        'customers.home',
        compact('dresses')
    );


})->name('home');



    Route::get('/rentals',
    [CustomerRentalController::class,'index']
    )->name('rentals');



    Route::post('/rentals',
    [CustomerRentalController::class,'store']
    )->name('rentals.store');

    Route::get('/dresses', function () {
    $dresses = Dress::orderBy('created_at','desc')
        ->get();
            return view(
                'customers.dresses',
                compact('dresses')
            );
        })->name('dresses');


});

Route::middleware(['auth','role:owner'])
->prefix('owner')
->name('owner.')
->group(function(){



    Route::get('/dashboard',
    [OwnerDashboardController::class,'index']
    )->name('dashboard');



    Route::get('/reports',
    [ReportController::class,'index']
    )->name('reports');



    Route::get('/reports/pdf',
    [PdfReportController::class,'export']
    )->name('reports.pdf');



    Route::get('/history',
    [OwnerHistoryController::class,'index']
    )->name('history');



    Route::get('/users',
    [UserController::class,'index']
    )->name('users');



    Route::post('/users',
    [UserController::class,'store']
    )->name('users.store');



    Route::put('/users/{user}',
    [UserController::class,'update']
    )->name('users.update');



    Route::delete('/users/{user}',
    [UserController::class,'destroy']
    )->name('users.destroy');


});

Route::middleware(['auth','role:admin'])
->prefix('admin')
->name('admin.')
->group(function(){



// Dashboard

Route::get('/dashboard',
[DashboardController::class,'index']
)->name('dashboard');




// Calendar

Route::get('/calendar',
[CalendarController::class,'index']
)->name('calendar');




// Rentals

Route::get('/rentals',
[AdminRentalController::class,'index']
)->name('rentals');


Route::post('/rentals/{rental}/approve',
[AdminRentalController::class,'approve']
)->name('rentals.approve');


Route::post('/rentals/{rental}/reject',
[AdminRentalController::class,'reject']
)->name('rentals.reject');


Route::post('/rentals/{rental}/start',
[AdminRentalController::class,'startRental']
)->name('rentals.start');


Route::post('/rentals/{rental}/return',
[AdminRentalController::class,'returnDress']
)->name('rentals.return');


Route::post('/rentals/{rental}/cancel',
[AdminRentalController::class,'cancel']
)->name('rentals.cancel');




// Dress

Route::get('/dresses',
[DressController::class,'index']
)->name('dresses');


Route::post('/dresses',
[DressController::class,'store']
)->name('dresses.store');


Route::put('/dresses/{dress}',
[DressController::class,'update']
)->name('dresses.update');


Route::delete('/dresses/{dress}',
[DressController::class,'destroy']
)->name('dresses.destroy');




// Return

Route::get('/returns',
[ReturnController::class,'index']
)->name('returns');




// History

Route::get('/history',
[AdminHistoryController::class,'index']
)->name('history');


});

Route::middleware('auth')
->group(function(){


Route::get('/profile',
[ProfileController::class,'edit']
)->name('profile.edit');


Route::patch('/profile',
[ProfileController::class,'update']
)->name('profile.update');


Route::delete('/profile',
[ProfileController::class,'destroy']
)->name('profile.destroy');


});

require __DIR__.'/auth.php';
