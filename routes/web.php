<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\UserFormController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/*Route::get('/userinfo', function() {
        return view('userinfo', [
            'firstName' => 'Jan',
            'lastName' => 'Kowalski',
            'city' => 'Warszawa'
        ]);
});*/

Route::view('info', 'info');

Route::redirect('/witam', '/');


Route::get('user/contact/{userId}', function(int $userId){
    return 'Kontakt do użytkownika '.$userId;
});


Route::prefix('admin')->group(function(){
    Route::get('/users', function(){
        return '<h3>Użytkownicy admin</h3>';
    });

    Route::get('/home', function(){
        return '<h3>Strona główna admin</h3>';
    });
});

Route::prefix('user')->group(function(){
    Route::get('/users', function(){
        return '<h3>Użytkownicy</h3>';
    });

    Route::get('/home', function(){
        return '<h3>Strona główna użytkownika</h3>';
    });
});

Route::redirect('/admin', '/admin/home');
Route::redirect('/user', '/user/home');

Route::get('show', [ShowController::class, 'show']);
Route::get('showuser', [ShowController::class, 'showView']);
Route::get('showarray', [ShowController::class, 'showArray']);

Route::view('userform', 'forms.user_form');
Route::get('UserFormController', [UserFormController::class, 'showUser']);

Route::view('order', 'order');
Route::get('showorder', [OrderController::class,'showOrder']);

Route::view('orderarray', 'orderarray');
Route::get('showorderarray', [OrderController::class, 'showOrderArray']);

Route::get('new_product', [ProductController::class, 'store']);