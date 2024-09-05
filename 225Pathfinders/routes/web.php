<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use BotMan\BotMan\BotMan;


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

Route::get('/company/search', [CompanyController::class, 'search'])->name('company.search');
Route::match(['get', 'post'], '/botman', function () {
    $botman = app('botman');
    // Initialiser l'objet Botman en utilisant le conteneur de service Laravel

    $botman->hears('Bonjour', function (BotMan $bot) {
        $bot->reply('Bonjour ! Comment puis-je vous aider aujourd\'hui ?');
        // Le bot écoute l'entrée "Bonjour" et répond avec un message de bienvenue.
    });

    // Ajouter plus de logique de conversation ici...
    // Par exemple, ajouter d'autres commandes ou interactions selon les besoins.

    $botman->listen();
    // Démarre l'écoute des commandes du bot pour répondre aux utilisateurs.
});

require __DIR__.'/auth.php';
