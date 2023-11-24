<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TinvestorController;
use App\Http\Controllers\TinvestortrxController;
use App\Http\Controllers\UserManagementController;

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
Route::get('/wel', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});


Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/add_newadmin', [UserManagementController::class, 'addView'])->middleware('auth');;
Route::post('/add_newadmin', [UserManagementController::class, 'addUser'])->middleware('auth');;

Route::get('/dashboard', function(){
    return view('dashboard.index', [
        'title' => 'Reap Admin Internal System',
        'active' => 'dashboard'
    ]);
}
)->middleware('auth');

Route::get('/investor_profiles', [TinvestorController::class, 'index'])->name('investor_profiles')->middleware('auth');
Route::post('/investor_profiles', [TinvestorController::class, 'store'])->middleware('auth');
Route::patch('/investor_update/{id}', [TinvestorController::class, 'update'])->name('investor.update');


Route::get('/investor_portofolio', [TinvestortrxController::class, 'index'])->name('investor_portofolio')->middleware('auth');
Route::post('/investor_portofolio', [TinvestortrxController::class, 'store'])->middleware('auth');
Route::patch('/investorcontract/{id}', [TinvestortrxhistoryController::class, 'index'])->name('investorcontract');
Route::get('/investorcontract_installment/{installment:history_no}', [TinvestortrxInstallmentController::class, 'show']);

