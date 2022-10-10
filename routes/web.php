<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\MailController;
use App\Http\Controllers\Backend\SocialLoginController;
use App\Http\Controllers\Backend\ProfileController;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('contact', ContactController::class);
Route::get('/trash-contact', [ContactController::class, 'all_trash_contact'])->name('contact.trash');
Route::get('/delete/{id}', [ContactController::class, 'delete'])->name('contact.delete');
Route::get('/permanent-delete/{id}', [ContactController::class, 'permanent_delete'])->name('permanent.delete');
Route::get('/restore/{id}', [ContactController::class, 'contact_restore'])->name('contact.restore');
Route::get('/send/{id}', [ContactController::class, 'send_mail'])->name('send-mail');


// mail body controller

Route::get('mail/index', [MailController::class, 'index'])->name('mail.index');
Route::post('mail/store', [MailController::class, 'store'])->name('mail.store');
Route::post('update_mail/{id}', [MailController::class, 'update_mail'])->name('mail.update');

// Google auth route
Route::get('google/redirect', [SocialLoginController::class, 'LoginWithGoogle'])->name("google.login");
Route::get('google/callback', [SocialLoginController::class, 'CallbackFronGoogle'])->name("google.callback");


// Profile route

Route::get('profile/index', [ProfileController::class, 'profile_index'])->name('profile.index');
