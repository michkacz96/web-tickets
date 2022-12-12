<?php

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

Route::get('/', function () {
    return view('auth.login');
});
//ticket categories
Route::delete('/ticket-categories/{ticket_category}/force-delete', [App\Http\Controllers\TicketCategoryController::class, 'forceDelete'])->name('ticket-categories.force-delete');
Route::post('/ticket-categories/{ticket_category}/restore', [App\Http\Controllers\TicketCategoryController::class, 'restore'])->name('ticket-categories.restore');
Route::get('/ticket-categories/deleted', [App\Http\Controllers\TicketCategoryController::class, 'deleted'])->name('ticket-categories.deleted');
Route::resource('/ticket-categories', App\Http\Controllers\TicketCategoryController::class);

//customers
Route::delete('/customers/{customer}/force-delete', [App\Http\Controllers\CustomerController::class, 'forceDelete'])->name('customers.force-delete');
Route::post('/customers/{customer}/restore', [App\Http\Controllers\CustomerController::class, 'restore'])->name('customers.restore');
Route::get('/customers/deleted', [App\Http\Controllers\CustomerController::class, 'deleted'])->name('customers.deleted');
Route::resource('/customers', App\Http\Controllers\CustomerController::class);

//customers' contacts
Route::delete('/contacts/{contact}/force-delete', [App\Http\Controllers\CustomerContactController::class, 'forceDelete'])->name('contacts.force-delete');
Route::post('/contacts/{contact}/restore', [App\Http\Controllers\CustomerContactController::class, 'restore'])->name('contacts.restore');
Route::get('/contacts/deleted', [App\Http\Controllers\CustomerContactController::class, 'deleted'])->name('contacts.deleted');
Route::get('/contacts/emails', [App\Http\Controllers\CustomerContactController::class, 'emails'])->name('contacts.emails');
Route::get('/contacts/phones', [App\Http\Controllers\CustomerContactController::class, 'phones'])->name('contacts.phones');
Route::resource('/contacts', App\Http\Controllers\CustomerContactController::class);

//tickets
Route::delete('/tickets/{ticket}/force-delete', [App\Http\Controllers\TicketController::class, 'forceDelete'])->name('tickets.force-delete');
Route::post('/tickets/{ticket}/restore', [App\Http\Controllers\TicketController::class, 'restore'])->name('tickets.restore');
Route::get('/tickets/deleted', [App\Http\Controllers\TicketController::class, 'deleted'])->name('tickets.deleted');
Route::get('/tickets/{ticket}/assign', [App\Http\Controllers\TicketController::class, 'showAssignTo'])->name('tickets.assign');
Route::patch('/tickets/{ticket}/assign', [App\Http\Controllers\TicketController::class, 'assignTo'])->name('tickets.assign');
Route::patch('/tickets/{ticket}/accept', [App\Http\Controllers\TicketController::class, 'accept'])->name('tickets.accept');
Route::patch('/tickets/{ticket}/refuse', [App\Http\Controllers\TicketController::class, 'refuse'])->name('tickets.refuse');
Route::patch('/tickets/{ticket}/close', [App\Http\Controllers\TicketController::class, 'close'])->name('tickets.close');
Route::resource('/tickets', App\Http\Controllers\TicketController::class);

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

// Route::group([
//     'prefix' => '{locale}',
//     'middleware' => 'setlocale',
// ], function(){
//     Route::get('/', function () {
//         return view('welcome');
//     });

//     Route::resource('ticket-categories', App\Http\Controllers\TicketCategoryController::class);
//     Auth::routes();
//     Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// });
