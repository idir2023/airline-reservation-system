<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    ActualiteController,
    HomeController,
    ProfileController,
    VisaController,
    AssuranceController,
    ConsultationController,
    ContactController,
    ReviewController,
    ConsultationFormulaireController,
    AssuranceFormulaireController,
    LieuDepotController,
    DashboardController,
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

            //Consultation-Formulaire
            Route::resource("consultation-formulaire", ConsultationFormulaireController::class);

            //Assurance-Formulaire
            Route::resource("assurance-formulaire", AssuranceFormulaireController::class);

            // CONTACT us
            Route::resource("contact", ContactController::class);

            // Reviews
            Route::resource("reviews", ReviewController::class);
            // routes/web.php
            Route::resource('lieu_depots', LieuDepotController::class);
            Route::resource('reviews', ReviewController::class);
            Route::get('/admin/index', [DashboardController::class, 'index'])->name('admin.index');
            Route::get('/', [HomeController::class, 'index'])->name('home');


            Route::get('/admin/index', [DashboardController::class, 'index'])->name('admin.index');

            // // Route pour afficher le formulaire de création d'un lieu de dépôt
            // Route::get('lieu_depots/create', [LieuDepotController::class, 'create'])->name('lieu_depots.create');

            // // Route pour enregistrer un nouveau lieu de dépôt
            // Route::post('lieu_depots/store', [LieuDepotController::class, 'store'])->name('lieu_depots.store');

        });
    });
});

// client 
Route::view('/', 'client.index');
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/visa', [HomeController::class, 'getvisa'])->name('visa');
Route::get('/actualite', [HomeController::class, 'getactualite'])->name('actualite');
Route::get('/consultation', [HomeController::class, 'getconsultation'])->name('consultation');
Route::get('/assuarance', [HomeController::class, 'getassuarance'])->name('assuarance');
Route::get('/contact', [HomeController::class, 'getcontact'])->name('contact');
Route::get('/reviews', [HomeController::class, 'getreviews'])->name('reviews');
// routes/web.php
Route::get('/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

// save consultation-formulaire
Route::post('/save-consultation-formulaire', [HomeController::class, 'save_consultation_formulaire'])->name('save_consultation_formulaire');
Route::post('/save-assuarance-formulaire', [HomeController::class, 'save_assuarance_formulaire'])->name('save_assuarance_formulaire');


//Language Translation
Route::get('/index/{locale}', [HomeController::class, 'lang']);

Route::post('/store-temp-file', [HomeController::class, 'storeTempFile'])->name('storeTempFile');
Route::post('/delete-temp-file', [HomeController::class, 'deleteTempFile'])->name('deleteTempFile');

Route::get('/get-random-customer', [SandboxController::class, 'randomCustomer'])->name('randomCustomer');

//render files inside views/template folder
Route::get('{any}', [HomeController::class, 'index'])->name('index');
