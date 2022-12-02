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
Route::delete('/contacts/{customer_contact}/force-delete', [App\Http\Controllers\CustomerContactController::class, 'forceDelete'])->name('contacts.force-delete');
Route::post('/contacts/{customer_contact}/restore', [App\Http\Controllers\CustomerContactController::class, 'restore'])->name('contacts.restore');
Route::get('/contacts/deleted', [App\Http\Controllers\CustomerContactController::class, 'deleted'])->name('contacts.deleted');
Route::get('/contacts/emails', [App\Http\Controllers\CustomerContactController::class, 'emails'])->name('contacts.emails');
Route::get('/contacts/phones', [App\Http\Controllers\CustomerContactController::class, 'phones'])->name('contacts.phones');
Route::resource('/contacts', App\Http\Controllers\CustomerContactController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
