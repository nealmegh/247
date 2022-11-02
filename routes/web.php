<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\AirportController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\FrontendController;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\QuickBookingController;
use App\Http\Controllers\SiteSettingsController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserTransactionController;
use App\Mail\testEmail;
use App\Models\QuickBooking;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mime\Email;


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
//Route::get('admin/', [ParametersController::class, 'index'])->name('admin');
Route::get('/email-test', function (){
    Mail::to('bipon.abrar@gmail.com ')->send(new testEmail());

//    if (Mail::failures()) {
//        return response()->Fail('Sorry! Please try again latter');
//    }else{
//        return response()->success('Great! Successfully send in your mail');
//    }
});
Route::get('/', [FrontendController::class, 'index'])->name('land');
Route::get('/email', [FrontendController::class, 'index1'])->name('land1');
Route::get('/terms', [FrontendController::class, 'terms'])->name('terms');
Route::post('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/payment', [PaymentController::class, 'payment'])->name('payment');

Route::post('/payment/add-funds/paypal',  [PaymentController::class, 'payWithpaypal'])->name('paypalPayment');
Route::post('/payment-status/{id}', [UserTransactionController::class, 'paymentStatus'])->name('paymentStatus');
//Route::post('/payment-status/{id}', [UserTransactionController::class, 'paymentStatus'])->name('paymentStatus');
Route::POST('/cash-payment', [UserTransactionController::class, 'cashPayment'])->name('cashPayment');
//Route::get('/paymentSuccess', 'UserTransactionController@paymentSuccess')->name('paymentSuccess');

Route::any('getFair', [FrontendController::class, 'getFair'])->name('getFair');


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('user/profile',[FrontendController::class, 'myInfo'])->name('user.profile');
    Route::post('user/update/{id}', [UserController::class,'update'])->name('user.update');
    Route::post('user/password/update/{id}', [UserController::class,'updatePassword'])->name('user.update.password');
    Route::group( [ 'middleware' => 'can:Customer'], function() {
        Route::get('customer/dashboard', [FrontendController::class, 'dashboard'])->name('customer.dashboard');
        Route::any('booking', [FrontendController::class, 'booking'])->name('booking');
        Route::POST('bookingStore', [FrontendController::class, 'bookingStore'])->name('front.booking.store');
        Route::get('bookingConfirmation/{id}', [FrontendController::class, 'bookingConfirmation'])->name('front.booking.confirm');
        // Route::POST('bookingStore', 'PaymentController@payWithpaypal')->name('front.booking.store');

        Route::post('update_customer', [App\Actions\Fortify\UpdateUserProfileInformation::class, 'customerUpdate'])->name('customer.update');
    });

    Route::group( ['prefix' => 'drivers', 'as' => 'driver.'], function() {
        Route::get('dashboard', [DriverController::class,'dashboard'])->name('dashboard');
        Route::post('trips/update/{id}', [TripController::class, 'update'])->name('update.trip');
    });
    Route::group( ['prefix' => 'admin', 'middleware' => 'can:Admin'], function() {
        Route::group( ['prefix' => 'users', 'as' => 'user.'], function() {
            Route::get('/', [UserController::class, 'index'])->name('users');
            Route::get('create', [UserController::class, 'create'])->name('create');
            Route::post('store', [UserController::class, 'store'])->name('store');
            Route::get('edit/{id}', [UserController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [UserController::class, 'update'])->name('update');
            Route::get('delete/{id}', [UserController::class, 'destroy'])->name('delete');
        });

        Route::get('dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
        Route::get('reports', [HomeController::class, 'reports'])->name('admin.reports');

        Route::group( ['prefix' => 'cars', 'as' => 'cars.'], function() {
            Route::get('/', [CarController::class, 'index'])->name('cars');
            Route::get('create', [CarController::class, 'create'])->name('create');
            Route::post('store', [CarController::class, 'store'])->name('store');
            Route::get('edit/{id}', [CarController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [CarController::class, 'update'])->name('update');
            Route::post('delete/{id}', [CarController::class, 'destroy'])->name('delete');
            Route::get('show/{id}', [CarController::class, 'show'])->name('show');
        });

        Route::group( ['prefix' => 'drivers', 'as' => 'driver.'], function() {
            Route::get('/', [DriverController::class,'index'])->name('drivers');
            Route::get('create', [DriverController::class,'create'])->name('create');
            Route::post('store', [DriverController::class,'store'])->name('store');
            Route::get('edit/{id}', [DriverController::class,'edit'])->name('edit');
            Route::get('show/{driver}', [DriverController::class,'show'])->name('show');
            Route::post('update/{id}', [DriverController::class,'update'])->name('update');
            Route::get('delete/{id}', [DriverController::class,'destroy'])->name('delete');
            Route::get('driver_user', [DriverController::class,'user_create'])->name('user');
            Route::post('upload', [DriverController::class,'upload'])->name('upload');
        });

        Route::get('customers', [CustomerController::class,'index'])->name('customers');

        Route::group( ['prefix' => 'invoices', 'as' => 'invoice.'], function() {
            Route::get('/', [InvoiceController::class, 'index'])->name('select');
            Route::post('store', [InvoiceController::class, 'store'])->name('store');
        });

        Route::group( ['prefix' => 'bills', 'as' => 'bill.'], function() {
            Route::get('/', [BillController::class, 'index'])->name('bills');
            Route::get('{id}', [BillController::class, 'show'])->name('show');
            Route::get('1/{id}', [BillController::class, 'show1'])->name('show1');
            Route::get('generate/{id}', [BillController::class, 'generateBill'])->name('generate');
            Route::get('email/{id}', [BillController::class, 'emailBill'])->name('email');
            Route::get('collect/{id}', [BillController::class, 'billCollect'])->name('collect');
        });

        Route::group( ['prefix' => 'airports', 'as' => 'airport.'], function() {
            Route::get('/', [AirportController::class, 'index'])->name('airports');
            Route::get('create', [AirportController::class, 'create'])->name('create');
            Route::post('store', [AirportController::class, 'store'])->name('store');
            Route::get('edit/{id}', [AirportController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [AirportController::class, 'update'])->name('update');
            Route::get('delete/{id}', [AirportController::class, 'destroy'])->name('delete');
        });

        Route::group( ['prefix' => 'locations', 'as' => 'location.'], function() {
            Route::get('/', [LocationController::class,'index'])->name('locations');
            Route::get('create', [LocationController::class,'create'])->name('create');
            Route::post('store', [LocationController::class,'store'])->name('store');
            Route::get('edit/{id}', [LocationController::class,'edit'])->name('edit');
            Route::post('update/{id}', [LocationController::class,'update'])->name('update');
            Route::get('delete/{id}', [LocationController::class,'destroy'])->name('delete');
        });

        Route::get('fairs', [LocationController::class,'fairs'])->name('fairs');

            Route::group( ['prefix' => 'bookings', 'as' => 'booking.'], function() {
            Route::get('/', [BookingController::class, 'index'])->name('bookings');
            Route::get('/completed', [BookingController::class, 'completed'])->name('completed');
            Route::get('/cancelled', [BookingController::class, 'cancelled'])->name('cancelled');
            Route::get('quickBooking/create', [QuickBookingController::class, 'create'])->name('quick.bookings.create');
            Route::get('quickBooking', [QuickBookingController::class, 'index'])->name('quick.bookings.index');
            Route::get('quickBooking/{QuickBooking}/final', [QuickBookingController::class, 'finalize'])->name('quick.bookings.final');
            Route::post('quickBooking/store', [QuickBookingController::class, 'store'])->name('quick.bookings.store');
            Route::get('create', [BookingController::class, 'create'])->name('create');
            Route::post('store', [BookingController::class, 'store'])->name('store');
            Route::get('edit/{id}', [BookingController::class, 'edit'])->name('edit');
            Route::post('show/{id}', [BookingController::class, 'show'])->name('show');
            Route::post('update/{id}', [BookingController::class, 'update'])->name('update');
            Route::get('assign/{id}', [BookingController::class, 'driverAssign'])->name('assign');
            Route::post('driverAssign/{id}', [BookingController::class, 'driverAssignStore'])->name('driver');
            Route::get('reassign/{id}', [BookingController::class, 'driverAssign'])->name('reassign');
            Route::post('driverReAssign/{id}', [BookingController::class, 'driverReAssignStore'])->name('driver.reassign');
            Route::get('confirmation/{id}', [BookingController::class, 'paymentConfirmation'])->name('payment');
            Route::get('completion/{id}', [BookingController::class, 'jobCompletion'])->name('complete');
            Route::post('delete/{id}', [BookingController::class, 'destroy'])->name('delete');
            Route::get('restore/{id}', [BookingController::class, 'restore'])->name('restore');
            Route::post('priceUpdate', [BookingController::class, 'priceUpdate'])->name('price.update');
        });

        Route::group( ['prefix' => 'trips', 'as' => 'trip.'], function() {
            Route::get('/', [TripController::class, 'index'])->name('trips');
            Route::get('{id}', [TripController::class, 'show'])->name('show');
            Route::get('edit/{id}', [TripController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [TripController::class, 'update'])->name('update');
            Route::get('earnings/{id}', [TripController::class, 'earnings'])->name('earnings');
            Route::get('report/driver_days', [TripController::class, 'driverReportDays'])->name('driverReport.days');
            Route::get('report/vehicle_days', [TripController::class, 'vehicleReportDays'])->name('vehicleReport.days');
        });

        Route::group( ['prefix' => 'settings', 'as' => 'setting.'], function() {
            Route::get('/', [SiteSettingsController::class,'index'])->name('settings');
            Route::get('/email', [SiteSettingsController::class,'email'])->name('email');
            Route::get('/frontend', [SiteSettingsController::class,'frontend'])->name('frontend');
            Route::post('update/', [SiteSettingsController::class,'update'])->name('update');
            Route::post('update/email', [SiteSettingsController::class,'emailUpdate'])->name('update.email');
            Route::get('fairRaise/', [SiteSettingsController::class,'fairRaiseForm'])->name('fair.form');
            Route::post('fairRaise/', [SiteSettingsController::class,'fairRaise'])->name('fair');
        });

    });

    Route::group( ['prefix'=> 'agent','middleware' => 'can:Agent', 'as' => 'agent.'], function()
    {
        Route::get('dashboard', [AgentController::class, 'Index'])->name('dashboard');
        Route::get('bookings', [AgentController::class, 'bookingIndex'])->name('bookings');
        Route::get('booking/create', [AgentController::class, 'create'])->name('booking.create');
        Route::post('booking/store', [BookingController::class, 'Store'])->name('booking.store');
//        Route::get('agent/booking/edit/{id}', 'BookingController@edit')->name('booking.edit');
//        Route::post('agent/booking/update/{id}', 'BookingController@update')->name('booking.update');
//        Route::get('agent/booking/assign/{id}', 'BookingController@driverAssign')->name('booking.assign');
//        Route::post('agent/booking/driver/{id}', 'BookingController@driverAssignUpdate')->name('booking.driver');
//        Route::get('agent/booking/confirmation/{id}', 'BookingController@paymentConfirmation')->name('booking.payment');
//        Route::get('agent/booking/completion/{id}', 'BookingController@jobCompletion')->name('booking.complete');
//        Route::get('agent/booking/delete/{id}', 'BookingController@destroy')->name('booking.delete');
        Route::post('booking/priceUpdate', [BookingController::class, 'priceUpdate'])->name('price.update');


    });

});

