<?php

<<<<<<< HEAD
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AddmenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
=======
use App\Http\Controllers\ProfileController;
>>>>>>> f0fbe1f3fb851607ff0b866645be0c5247768002
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

<<<<<<< HEAD
=======
Route::get('/', function () {
    return view('welcome');
});
>>>>>>> f0fbe1f3fb851607ff0b866645be0c5247768002

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

<<<<<<< HEAD
//Auth route
=======
>>>>>>> f0fbe1f3fb851607ff0b866645be0c5247768002
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
<<<<<<< HEAD
    Route::get('/addproduct/create', [ProductController::class,'create'])->name('addproduct');
    Route::post('addproduct/store', [ProductController::class, 'store']);
    Route::get('/product', [ProductController::class, 'index']);

});

//Addmenu Route
Route::get('/addmenu/create', [AddmenuController::class, 'create'])->name('addmenu');
Route::post('/addmenu/store', [AddmenuController::class, 'store']);
Route::get('/addmenu/delete/{id}', [AddmenuController::class, 'delete'])->name('delete');
Route::get('/{menu:slug}', [DashboardController::class, 'index'])->name('menu');
Route::get('/addmenu/edit/{id}', [AddmenuController::class, 'edit'])->name('edit');
Route::get('/',[DashboardController::class,'jon']);
=======
});

>>>>>>> f0fbe1f3fb851607ff0b866645be0c5247768002
require __DIR__.'/auth.php';
