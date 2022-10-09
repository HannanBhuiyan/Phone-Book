<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\ContactController;



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
