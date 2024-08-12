<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    ActualiteController,
    AppointmentController,
    HomeController,
    CustomerController,
    ProfileController,
    VisaController,
    AssuranceController,
    ConsultationController,
    RendezVousController
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

            // Rendezvous
            Route::resource("appointments", AppointmentController::class);
             // assurances
             Route::resource("assurances", Con::class);
            //customers
            Route::get("customers", [CustomerController::class, "index"])->name('customers.index');
            Route::get("customers/{user}", [CustomerController::class, "show"])->name('customers.show');
        });
    });
});

Route::view('/', 'index');

//Language Translation
Route::get('/index/{locale}', [HomeController::class, 'lang']);

Route::post('/store-temp-file', [HomeController::class, 'storeTempFile'])->name('storeTempFile');
Route::post('/delete-temp-file', [HomeController::class, 'deleteTempFile'])->name('deleteTempFile');

Route::get('/get-random-customer', [SandboxController::class, 'randomCustomer'])->name('randomCustomer');

//render files inside views/template folder
Route::get('{any}', [HomeController::class, 'index'])->name('index');
