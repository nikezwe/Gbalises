<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\BaliseController;
use App\Http\Controllers\admin\TypeBaliseController;
use App\Http\Controllers\admin\CommandeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\balisescontroller;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\admin\UsersController;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\admin\StockController;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\admin\FacturationController;
use App\Http\Controllers\admin\AdminController;
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


// Route désactivée, doit être protégée par auth

Route::get('/publication',[PublicationController::class,'index'])->name('publication.index');
Route::get('/about',[AboutController::class,'index'])->name('about.index');
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/product', [ProductController::class, 'index'])->name('product.index');

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
Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function (){
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('balise',BaliseController::class)->except('show');
    Route::resource('typebalise',TypeBaliseController::class)->except('show');
    Route::resource('facturation', FacturationController::class);
    Route::resource('commande',CommandeController::class)->except('show');
    Route::get('users', [UsersController::class, 'index'])->name('users.index');
    Route::get('stock', [StockController::class, 'index'])->name('stock.index');
    Route::post('stock/{balise}', [StockController::class, 'update'])->name('stock.update');
// });
});

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');
});

// Route publique pour afficher le panier (pour tous, gestion JS côté client)
Route::get('/panier', function() {
    return view('panier');
})->name('panier');

// Routes du panier (backend, pour utilisateurs connectés)
Route::middleware('auth')->group(function () {

    Route::post('/panier', [CartController::class, 'store'])->name('cart.store');

    Route::patch('/panier/{cart}', [CartController::class, 'update'])->name('cart.update');

    Route::delete('/panier/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');

    Route::delete('/panier', [CartController::class, 'clear'])->name('cart.clear');

    Route::get('/commande', [CommandeController::class, 'create'])->name('commande.create');
    Route::post('/commande', [CommandeController::class, 'store'])->name('commande.store');
    Route::get('/mes-commandes', [CommandeController::class, 'index'])->name('commande.index');
});
Route::get('/panier/count', [CartController::class, 'getCartCount'])->name('cart.count');

// Formulaire de commande pour l'utilisateur (protégé par auth)
Route::middleware('auth')->group(function () {
    Route::get('/commande', function() {
        
        $user = Auth::user();
        $panier = Cart::with('balise')
            ->where('user_id', $user->id)
            ->get();
        return view('commande', compact('panier', 'user'));
        })->name('commande.form');
    Route::post('/commande', [CommandeController::class, 'store'])->name('commande.store');
});

// Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
//     Route::get('stock', [StockController::class, 'index'])->name('stock.index');
//     Route::post('stock/{balise}', [StockController::class, 'update'])->name('stock.update');
// });





