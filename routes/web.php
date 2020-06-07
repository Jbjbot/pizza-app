<?php

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

use App\Ingredient;
use App\Pizza;

Route::get('/', function () {
	/*
	 * Get all ingredients
	 */
		$ingredient = Ingredient::class;
		$ingredients = $ingredient::all();

	/*
	 * Get all pizza
	 */
	  $pizza = Pizza::class;
		$pizzas = $pizza::all();

    return view('welcome', compact('ingredients', 'pizzas'));
})->name('home');

Route::resource('ingredient', 'IngredientController');
Route::resource('pizza', 'PizzaController');
