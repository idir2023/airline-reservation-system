<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    ActualiteController,
    HomeController,
    CustomerController,
    ProfileController,
    VisaController,
    AssuranceController,
    ConsultationController,
    ContactController,
    ReviewController
};

Auth::routes();

Route::group(["prefix" => 'dashboard'], function () {
    Route::group(['middleware' => 'auth'], function () {
        /* ================== USER ROUTES ================== */
        //profile
        Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
        Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
        Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');

        /* ================== ADMIN ROUTES ================== */
        Route::group(['middleware' => 'admin'], function () {
            Route::get('/', [HomeController::class, 'root'])->name('root');

            //visas
            Route::resource("visas", VisaController::class);

            //Actualite
            Route::resource("actualites", ActualiteController::class);

            // assurances
            Route::resource("assurances", AssuranceController::class);

            // consultations
            Route::resource("consultations", ConsultationController::class);
            
            // CONTACT us
            Route::resource("contact", ContactController::class);

            // Reviews
            Route::resource("reviews", ReviewController::class);

            //customers
            Route::get("customers", [CustomerController::class, "index"])->name('customers.index');
            Route::get("customers/{user}", [CustomerController::class, "show"])->name('customers.show');
        });
    });
});

// client 
Route::view('/', 'client.index');
Route::get('/visa', [HomeController::class, 'getvisa'])->name('visa');
Route::get('/actualite', [HomeController::class, 'getactualite'])->name('actualite');
Route::get('/consultation', [HomeController::class, 'getconsultation'])->name('consultation');
Route::get('/assuarance', [HomeController::class, 'getassuarance'])->name('assuarance');
Route::get('/contact', [HomeController::class, 'getcontact'])->name('contact');

Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
// 
use App\Http\Controllers\HomeController;

Route::get('/assurances', [HomeController::class, 'getAssurances'])->name('assurances.index');



//Language Translation
Route::get('/index/{locale}', [HomeController::class, 'lang']);

Route::post('/store-temp-file', [HomeController::class, 'storeTempFile'])->name('storeTempFile');
Route::post('/delete-temp-file', [HomeController::class, 'deleteTempFile'])->name('deleteTempFile');

Route::get('/get-random-customer', [SandboxController::class, 'randomCustomer'])->name('randomCustomer');

//render files inside views/template folder
Route::get('{any}', [HomeController::class, 'index'])->name('index');
