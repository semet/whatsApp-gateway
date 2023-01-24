<?php

use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\RegistrationController;
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
    return view('welcome');
});

Route::get('register', [RegistrationController::class, 'showForm'])->name('registration');
Route::post('register', [RegistrationController::class, 'register'])->name('registration.post');
Route::get('verify-phone', [RegistrationController::class, 'verifyPhoneView'])->name('registration.otp.show');
Route::post('verify-verify', [RegistrationController::class, 'verifyPhone'])->name('registration.otp.verify');

Route::get('verify-email/{id}', [EmailVerificationController::class, 'verify'])->name('email.verification');


Route::get('/message', [MessageController::class, 'showForm']);
Route::post('/message', [MessageController::class, 'send'])->name('message.send');
