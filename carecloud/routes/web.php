<?php 
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\BillingController;
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
    return view('patient.appointments.create');
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
});
/////views for patients end////

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

// Admin Routs   //
Route::get('/admin', [AdminController::class, 'dashboard'])->name('dashboard');
// Route::get('/appointments', [AdminController::class, 'appointments'])->name('appointments');
Route::resource('patients', PatientsController::class);
Route::resource('doctors', DoctorsController::class);
Route::resource('cities', CityController::class);
Route::resource('hospital', HospitalController::class);
Route::resource('reports', ReportController::class)->only(['index','show']);
Route::resource('billings', BillingController::class);

//apointments
Route::resource('appointments', AppointmentController::class);
Route::get('/appointments.create',[AppointmentController::class,'create']);

Route::get('/doctor/create', [DoctorController::class, 'create']);
Route::post('/doctor/store', [DoctorController::class, 'store']);


// use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

//doctor dashboard view
Route::get('/doctorview',[DoctorController::class,"doctordashboard"])->name('doctordashboard');
Route::get('/doctorappoinment',[DoctorController::class,"doctorappoinment"])->name('doctorappoinment');