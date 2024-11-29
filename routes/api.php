<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\MedicaltestController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\PrescriptionController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\TreatmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::controller(AuthController::class)->group(function () {

    Route::post('/register', 'register');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->middleware('auth:sanctum');
});

Route::post('/book', [BookController::class, 'store']);
Route::post('/review', [ReviewController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {

    //BookAppointment

    Route::get('/book', [BookController::class, 'index']);
    Route::get('/book/{id}', [BookController::class, 'delete']);
    Route::get('/searchBook', [BookController::class, 'search']);


    //medicaltest

    Route::Post('/medicaltest', [MedicaltestController::class, 'create']);
    Route::Post('/medicaltest/{id}', [MedicaltestController::class, 'update']);
    Route::get('/medicaltest/{id}', [MedicaltestController::class, 'delete']);
    Route::get('/medicaltest', [MedicaltestController::class, 'index']);
    Route::get('/searchMedicalTest', [MedicaltestController::class, 'search']);


    //patients

    Route::Post('/patient', [PatientController::class, 'create']);
    Route::Post('/patient/{id}', [PatientController::class, 'update']);
    Route::get('/patient/{id}', [PatientController::class, 'delete']);
    Route::get('/patient', [PatientController::class, 'store']);
    Route::get('/searchPatient', [PatientController::class, 'search']);


    //prescription

    Route::Post('/prescription', [PrescriptionController::class, 'create']);
    Route::Post('/prescription/{id}', [PrescriptionController::class, 'update']);
    Route::get('/prescription/{id}', [PrescriptionController::class, 'delete']);
    Route::get('/prescription', [PrescriptionController::class, 'store']);
    Route::get('/searchPrescription', [PrescriptionController::class, 'search']);


    //Treatments

    Route::Post('/treatment', [TreatmentController::class, 'create']);
    Route::Post('/treatment/{id}', [TreatmentController::class, 'update']);
    Route::get('/treatment/{id}', [TreatmentController::class, 'delete']);
    Route::get('/treatment', [TreatmentController::class, 'store']);
    Route::get('/searchtreatment', [TreatmentController::class, 'search']);
});
