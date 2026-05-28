<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Recipe;
use App\Http\Controllers\RecipeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('recipes', RecipeController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('materials/manage', [RecipeController::class, 'manageMaterial'])->name('materials.manage');
    Route::post('materials', [RecipeController::class, 'storeMaterial'])->name('materials.store');
    Route::get('materials/{id}/edit', [RecipeController::class, 'editMaterial'])->name('materials.edit');
    Route::put('materials/{id}', [RecipeController::class, 'updateMaterial'])->name('materials.update');
    Route::delete('materials/delete/bulk', [RecipeController::class, 'destroyBulkMaterials'])->name('materials.destroy_bulk');
});

require __DIR__ . '/auth.php';
