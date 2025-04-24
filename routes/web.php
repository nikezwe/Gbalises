<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\BaliseController;
use App\Http\Controllers\admin\TypeBaliseCOntroller;
use App\Http\Controllers\admin\CommandeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\balisescontroller;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\admin\UsersController;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CartController;


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

$idregex = '[0-9]+';
$slugregex = '[a-z0-9\-]+';

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/balise',[balisesController::class,'index'])->name('balise.index');
Route::get('/balise/{slug}/{balise}', [balisesController::class, 'show'])->name('balise.show')->where([
    'balise' => $idregex,
    'slug' => $slugregex
]);

Route::post('/balise/{balise}/commande',[balisescontroller::class,'commande'])
->name('balise.commande')
->middleware('auth');
Route::get('/commande/{userId}', [CommandeController::class, 'index'])
->name('commande.index');

Route::get('/commande', [CommandeController::class, 'create'])->name('commande.create');
Route::get('/publication',[PublicationController::class,'index'])->name('publication.index');
Route::get('/about',[AboutController::class,'index'])->name('about.index');

Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


//Authentification 

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route::middleware(['role:admin'])->group(function (){
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('balise',BaliseController::class)->except('show');
    Route::resource('typebalise',TypeBaliseController::class)->except('show');
    Route::resource('commande',CommandeController::class)->except('show');
    Route::get('users', [UsersController::class, 'index'])->name('users.index');
// });
});

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');
});


// Route::middleware(['role:user'])->group(function () {
//     Route::get('/home', function () {
//         return view('home');
//     })->name('home');
// });




