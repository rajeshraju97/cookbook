<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ingredient;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ingredients = Ingredient::all();
        return view('admin.ingredients.index', compact('ingredients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.ingredients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'dish_name' => 'required|string|max:255',
            'ingredients' => 'required|array',
            'ingredients.*.name' => 'required|string|max:255',
            'ingredients.*.unit' => 'required|string|max:50',
            'ingredients.*.quantity' => 'required|numeric|min:1',
            'ingredients.*.price' => 'required|numeric|min:0',
            'ingredients.*.type' => 'required|in:variable,fixed',
        ]);

        // Format the ingredients into a JSON structure
        $ingredientsJson = [];
        foreach ($validated['ingredients'] as $ingredient) {
            $ingredientsJson[$ingredient['name']] = [
                'unit' => $ingredient['unit'],
                'quantity' => $ingredient['quantity'],
                'price' => $ingredient['price'],
                'type' => $ingredient['type'],
            ];
        }

        // Store the dish and its ingredients in the database
        Ingredient::create([
            'dish_id' => 103,
            'dish_name' => $validated['dish_name'],
            'ingredients' => json_encode($ingredientsJson), // Store as JSON
            'no_members' => 30,
            'total_price' => 750,
        ]);

        return redirect()->route('ingredients.index')->with('success', 'Dish and ingredients added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ingredient $ingredient)
    {
        return view('admin.ingredients.show', compact('ingredient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ingredient $ingredient)
    {
        return view('admin.ingredients.edit', compact('ingredient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();

        return redirect()->route('admin.ingredients.index')->with('success', 'Ingredient deleted successfully!');
    }
}
