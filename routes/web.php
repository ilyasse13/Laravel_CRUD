
<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
 
 
Route::get('/', function () {
    return view('welcome');
});
 
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});
 
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/home/create',[HomeController::class,'create'])->name('create');
    Route::post('/home/create',[HomeController::class,'store'])->name('store');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/home/{RefPdt}/show',[HomeController::class,'show'])->name('show');
    Route::get('/home/{RefPdt}/edit',[HomeController::class,'edit'])->name('edit');
    Route::put('/home/{RefPdt}',[HomeController::class, 'update'])->name('update');
    Route::delete('/home/{RefPdt}/delete',[HomeController::class,'destroy'])->name('delete');
});