<?php

namespace App\Http\Controllers;

use App\Pizza;
use App\Ingredient;
use Illuminate\Http\Request;
use Redirect;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:pizza',
        ]);

        $ingredients = $request->ingredients;
        if(!isset($ingredients) && $ingredients === null) {
            return Redirect::back()->withErrors('Veuillez sélectionner des ingrédients pour continuer');
        }
        
        $pizza = Pizza::firstOrCreate([
            'name' => ucfirst($request->name),
        ]);

        $pizza->ingredients()->sync($ingredients);

        return redirect(route('home'))->with('status', 'Votre pizza a été créé avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function show(Pizza $pizza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function edit(Pizza $pizza, Ingredient $ingredient)
    {
        $ingredients = Ingredient::all()->toArray();

        return view('pizza.edit', compact('pizza', 'ingredients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pizza $pizza)
    {
        $ingredients = $request->ingredients;
        if(!isset($ingredients) && $ingredients === null) {
            return Redirect::back()->withErrors('Veuillez sélectionner des ingrédients pour continuer');
        }

        $pizza->ingredients()->sync($ingredients);

        return redirect(route('pizza.edit', [$pizza]))->with('status', 'Votre produit a bien été mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pizza $pizza)
    {
        //
    }
}
