<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dishes;
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
        $dishes = Dishes::all();
        return view('admin.ingredients.create', compact('dishes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'dish_id' => 'required|integer',
            'ingredients' => 'required|array',
            'ingredients.*.name' => 'required|string|max:255',
            'ingredients.*.quantity' => 'required|numeric|min:1',
            'ingredients.*.unit' => 'required|string|max:50',
            'ingredients.*.price' => 'required|numeric|min:0',
            'ingredients.*.type' => 'required|in:variable,fixed',
            'no_of_members' => 'required|integer|min:1',
        ]);

        try {
            // Format the ingredients into the desired JSON structure
            $ingredientsJson = [];
            foreach ($validated['ingredients'] as $ingredient) {
                $ingredientsJson[$ingredient['name']] = [
                    'quantity' => $ingredient['quantity'],
                    'unit' => $ingredient['unit'],
                    'price' => $ingredient['price'],
                    'type' => $ingredient['type'],
                ];
            }

            // Store the data in the database
            Ingredient::create([
                'dish_id' => $validated['dish_id'],
                'ingredients' => json_encode($ingredientsJson), // JSON format
                'no_of_members' => $validated['no_of_members'],
            ]);

            return redirect()->route('admin.ingredients.index')
                ->with('success', 'Dish Ingredients added successfully!');
        } catch (\Exception $e) {
            // Handle errors during the database operation
            return redirect()->back()
                ->with('error', 'Failed to add Dish Ingredients. Please try again.')
                ->withErrors($e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Ingredient $ingredient)
    {
        $ingredient->load('dishes'); // Load related models
        return response()->json([
            'dish_name' => $ingredient->dishes->dish_name,
            'dish_type' => $ingredient->dishes->dishType->type_name,
            'dish_description' => $ingredient->dishes->dish_description,
            'dish_image' => $ingredient->dishes->dish_image,
        ]);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $ingredient = Ingredient::find($id);
        $dishes = Dishes::all();
        return view('admin.ingredients.edit', compact('ingredient', 'dishes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request
        $validatedData = $request->validate([
            'dish_id' => 'required|integer',
            'ingredients' => 'required|array',
            'ingredients.*.name' => 'required|string|max:255',
            'ingredients.*.quantity' => 'required|numeric|min:1',
            'ingredients.*.unit' => 'required|string|max:50',
            'ingredients.*.price' => 'required|numeric|min:0',
            'ingredients.*.type' => 'required|in:variable,fixed',
            'no_of_members' => 'required|integer|min:1',
        ]);

        try {
            // Format the ingredients into the desired JSON structure
            $ingredients = $validatedData['ingredients'];
            $formattedIngredients = [];

            foreach ($ingredients as $ingredient) {
                $name = $ingredient['name']; // Extract the ingredient name
                unset($ingredient['name']); // Remove the name field from the array
                $formattedIngredients[$name] = $ingredient; // Map the ingredient details by name
            }

            // Find and update the ingredient record in the database
            $ingredientRecord = Ingredient::findOrFail($id);
            $ingredientRecord->dish_id = $validatedData['dish_id'];
            $ingredientRecord->ingredients = json_encode($formattedIngredients); // JSON encode the formatted data
            $ingredientRecord->no_of_members = $validatedData['no_of_members'];
            $ingredientRecord->save();

            return redirect()->route('admin.ingredients.index')
                ->with('success', 'Dish Ingredients updated successfully!');
        } catch (\Exception $e) {
            // Handle errors during the update process
            return redirect()->back()
                ->with('error', 'Failed to update Dish Ingredients. Please try again.')
                ->withErrors($e->getMessage());
        }
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();

        return redirect()->route('admin.ingredients.index')->with('success', 'Dish Ingredients deleted successfully!');
    }
}
