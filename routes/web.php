<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Livewire\Admin\Users\ListUsers;
use App\Http\Livewire\Admin\Users\ListUsers555;
use App\Http\Livewire\Admin\Appointments\ListAppointments;
use App\Http\Livewire\Admin\Appointments\ShowAppointments;
use App\Http\Livewire\Admin\Appointments\ListAppointments2;
use App\Http\Livewire\counter;
use App\Http\Livewire\Admin\Appointments\CreateAppointmentForm;
use App\Http\Livewire\Admin\Appointments\UpdateAppointmentForm;
use App\Http\Livewire\Analytics;


use App\Http\Livewire\AccStar\ListGjournal;
use App\Http\Livewire\AccStar\Customer;
use App\Http\Livewire\AccStar\CustomerForm;
use App\Http\Livewire\AccStar\Accounting;
use App\Http\Livewire\AccStar\Products;
use App\Http\Livewire\AccStar\SoDeliveryTax;

//For Test
use App\Http\Livewire\GetBuyer;


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
    return view('welcome');
});


Route::group(['middleware' => ['auth']], function () // For Admin only > Route::group(['middleware' => ['auth', 'admin']], function () 
{
    Route::get('admin/dashboard',DashboardController::class)->name('admin.dashboard');
    Route::get('admin/users',ListUsers::class)->name('admin.users');
    Route::get('admin/appointments', ListAppointments::class)->name('admin.appointments');
    Route::get('admin/appointments/create', CreateAppointmentForm::class)->name('admin.appointments.create');
    Route::get('admin/appointments/{appointment_id}/edit', UpdateAppointmentForm::class)->name('admin.appointments.edit');
    Route::get('admin/showappointments', ShowAppointments::class);
    Route::get('admin/appointments2', ListAppointments2::class);   

    //AccStar
    Route::get('accstar/gjournal', ListGjournal::class)->name('accstar.gljournal');
    Route::get('accstar/customer', Customer::class)->name('accstar.customer');
    Route::get('accstar/customer/{customer_id}/edit', CustomerForm::class)->name('accstar.customer.form');
    Route::get('accstar/sodeliverytax', SoDeliveryTax::class)->name('accstar.sodeliverytax');
    Route::get('accstar/accounting', Accounting::class); //Not Used
    Route::get('accstar/products', Products::class); //Not Used
});

Route::get('admin/users555',ListUsers555::class)->name('admin.users555');

Route::get('getbuyer', GetBuyer::class); //For Test
Route::get('getbuyer/action', [GetBuyer::class,'action'])->name('getbuyer.action'); //For Test