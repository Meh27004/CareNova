<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\AppointmentController;


/////views for patients////
Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('patient.index');
})->name('patient.dashboard');

Route::get('/about', function () {
    return view('patient.about');
});

Route::get('/appointment', function () {
    return view('patient.appointment');
});

Route::get('/blog-sidebar', function () {
    return view('patient.blog-sidebar');
});

Route::get('/blog-single', function () {
    return view('patient.blog-single');
});

Route::get('/confirmation', function () {
    return view('patient.confirmation');
});

Route::get('/contact', function () {
    return view('patient.contact');
});

Route::get('/department-single', function () {
    return view('patient.department-single');
});

Route::get('/department', function () {
    return view('patient.department');
});

Route::get('/doctor-single', function () {
    return view('patient.doctor-single');
});

Route::get('/doctor', function () {
    return view('patient.doctor');
});

Route::get('/service', function () {
    return view('patient.service');
});n
/////views for patients end////


// Patient side post route
Route::post('/appointment/store', [AppointmentController::class, 'store'])->name('appointment.store');

// Admin CRUD
Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
Route::get('/appointments/edit/{id}', [AppointmentController::class, 'edit'])->name('appointments.edit');
Route::post('/appointments/update/{id}', [AppointmentController::class, 'update'])->name('appointments.update');
Route::delete('/appointments/delete/{id}', [AppointmentController::class, 'destroy'])->name('appointments.delete');


// Auth Routes
Route::get('/login', function () {
    return view('Auth.login');
})->name('login');

Route::get('/register', function () {
    return view('Auth.register');
})->name('register');

//Auth Controller
Route::post('/register',[authController::class,'register'])->name('auth.register');
// Route::post('form/login',[authController::class,'login'])->name('auth.login');

Route::post('/login', [authController::class, 'login'])->name('auth.login');

