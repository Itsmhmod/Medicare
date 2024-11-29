<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookAppointmentController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ClientReviewController;
use App\Http\Controllers\DBookAppointmentController;
use App\Http\Controllers\DMedicalTestController;
use App\Http\Controllers\DocController;
use App\Http\Controllers\doctor\Auth\LoginController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\DPatientController;
use App\Http\Controllers\DPrescriptionController;
use App\Http\Controllers\DTreatmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicalTestController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\DoctorAuthController;
use App\Http\Middleware\authDoctor;
use App\Http\Middleware\guestDoctor;


use App\Http\Controllers\doctor\Auth\RegisteredUserController;
use App\Http\Controllers\ReviewController;

Route::prefix('doctor')->middleware('guest:doctor')->group(function () {

    Route::get('register', [RegisteredUserController::class, 'create'])->name('doctor.register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])->name('doctorD.login');

    Route::post('login', [LoginController::class, 'store']);
});

Route::prefix('doctor')->middleware('auth:doctor')->group(function () {

    Route::post('logout', [LoginController::class, 'destroy'])->name('doctor.logout');
});



Route::resource('/', HomeController::class);
Route::post('/books', [BookController::class, 'store'])->name('books');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews');

################### Admin Routes  ###############################

Route::middleware('auth')->group(function () {

    Route::resource('/dashboard', AdminController::class);

    Route::resource('/setting', SettingController::class);

    Route::resource('/blog', BlogController::class);

    Route::resource('/service', ServiceController::class);

    Route::resource('/specialization', SpecializationController::class);

    Route::resource('/doctor', DoctorController::class);

    Route::resource('/patient', PatientController::class);

    Route::resource('/bookAppointment', BookAppointmentController::class);

    Route::resource('/medicalTests', MedicalTestController::class);

    Route::resource('/treatment', TreatmentController::class);

    Route::resource('/prescription', PrescriptionController::class);

    Route::resource('/clientReview', ClientReviewController::class);
});
Route::get('/getDoctorDays', [DoctorsController::class, 'getDoctorDays']);


################### Doctor Routes  ###############################




################## Doctor Auth  ##################################

Route::middleware('auth:doctor')->group(function () {

    Route::resource('/dashboardDoctor', DocController::class);
    Route::resource('/patientD', DPatientController::class);
    Route::resource('/prescriptionD', DPrescriptionController::class);
    Route::resource('/treatmentD', DTreatmentController::class);
    Route::resource('/medicalTestsD', DMedicalTestController::class);
    Route::resource('/bookAppointmentD', DBookAppointmentController::class);
});


require __DIR__ . '/auth.php';
