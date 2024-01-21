<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\subcategoryController;
use App\Http\Controllers\Admin\postController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//__classes crud Route__//
Route::get('/class/index',[CategoryController::class,'index'])->name('class.index');
Route::get('/class/create',[CategoryController::class,'create'])->name('class.create');
Route::post('/class/store',[CategoryController::class,'store'])->name('class.store');
Route::get('/class/delete/{id}',[CategoryController::class,'delete'])->name('class.delete');
Route::get('/class/edit/{id}',[CategoryController::class,'edit'])->name('class.edit');
Route::post('/class/update/{id}',[CategoryController::class,'update'])->name('class.update');

//__Student Crud Route__//
Route::resource('students',StudentController::class);
//__Category Route Crud__//
Route::get('/Category/index',[CategoryController::class,'index'])->name('Category.index');
Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
Route::post('/Category/store',[CategoryController::class,'store'])->name('Category.store');
Route::get('/Category/edit/{id}',[CategoryController::class,'edit'])->name('Category.edit');
Route::post('/Category/update/{id}',[CategoryController::class,'update'])->name('Category.update');
Route::get('/Category/delete/{id}',[CategoryController::class,'destoy'])->name('Category.delete');

//__sub Category Crud Oparetion__//
Route::get('/subcategory/create',[subcategoryController::class,'create'])->name('subcategory.create');
Route::post('/subcategory/store',[subcategoryController::class,'store'])->name('subcategory.store');
Route::get('/subcategory/index',[subcategoryController::class,'index'])->name('subcategory.index');
Route::get('/subCategory/delete/{id}',[subcategoryController::class,'destoy'])->name('subCategory.delete');
Route::get('/subCategory/edit/{id}',[subcategoryController::class,'edit'])->name('subCategory.edit');
Route::post('/subcategory/update/{id}',[subcategoryController::class,'update'])->name('subcategory.update');

//__Create Post__//
Route::get('/post/create',[postController::class,'create'])->name('post.create');
Route::post('/post/store',[postController::class,'store'])->name('post.store');











//__EmailVerify__//
Auth::routes(['verify' => true]);

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
// _verification notice_//
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::post('/verification/resend', [App\Http\Controllers\HomeController::class, 'verificationresend'])->name('verification.resend');
Route::get('/password/change', [App\Http\Controllers\HomeController::class, 'passwordChange'])->name('password.change')->middleware(['auth', 'verified']);
Route::post('/Update/Password', [App\Http\Controllers\HomeController::class, 'update'])->name('Update.Password');
