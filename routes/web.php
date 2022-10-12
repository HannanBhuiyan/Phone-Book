<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\MailController;
use App\Http\Controllers\Backend\SocialLoginController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\UserController;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group([ 'middleware'=> ['admin', 'auth']], function(){

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

    // Profile route

    Route::get('profile/index', [ProfileController::class, 'profile_index'])->name('profile.index');
    Route::post('profile/image/change', [ProfileController::class, 'profile_image_change'])->name('profile.image.edit');
    Route::post('profile/content/change', [ProfileController::class, 'profile_content_change'])->name('profile.content.edit');
    Route::post('password/change', [ProfileController::class, 'password_change'])->name('password.change');

    // User route

    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::get('admin/role/change/{id}', [UserController::class, 'admin_role_change'])->name('admin.role.change');
    Route::get('user/role/change/{id}', [UserController::class, 'user_role_change'])->name('user.role.change');
    Route::get('user/active/{id}', [UserController::class, 'user_active'])->name('user.active');
    Route::get('user/banned/{id}', [UserController::class, 'user_banned'])->name('user.banned');
});
 // Google auth route
 Route::get('google/redirect', [SocialLoginController::class, 'LoginWithGoogle'])->name("google.login");
 Route::get('google/callback', [SocialLoginController::class, 'CallbackFronGoogle'])->name("google.callback");
