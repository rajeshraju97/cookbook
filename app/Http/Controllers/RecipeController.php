<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredient;
use App\Models\Order;

class RecipeController extends Controller
{
    //
    public function getIngredients($dishId, $members)
    {
        // Fetch the record by dish_id
        $recipe = Ingredient::where('dish_id', $dishId)->first();

        // Handle cases where the recipe is not found
        if (!$recipe) {
            return response()->json(['message' => 'Recipe not found'], 404);
        }

        // Decode the JSON ingredients data
        $baseIngredients = json_decode($recipe->ingredients, true);

        if (!$baseIngredients) {
            return response()->json(['message' => 'Invalid ingredients data'], 500);
        }

        // Scale ingredients based on the number of members
        $baseMembers = $recipe->no_members;
        $scaledIngredients = [];

        foreach ($baseIngredients as $name => $ingredient) {
            $scaledQuantity = $ingredient['quantity'];
            $scaledPrice = $ingredient['price'];
            $unit = $ingredient['unit'];


            // If the quantity is numeric, scale it based on the number of members
            if (is_numeric($ingredient['quantity'])) {
                $scaledQuantity = ($ingredient['quantity'] / $baseMembers) * $members;
            }

            // Scale the price based on the number of members
            $scaledPrice = ($ingredient['price'] / $baseMembers) * $members;

            // Store scaled ingredients with both quantity and price
            $scaledIngredients[] = [
                'name' => $name,
                'scaled_quantity' => $scaledQuantity,
                'unit' => $unit,
                'scaled_price' => round($scaledPrice, 2), // round price to two decimal places
            ];
        }

        return response()->json(['ingredients' => $scaledIngredients], 200);
    }




    public function orderIngredients(Request $request)
    {
        $validated = $request->validate([
            'dish_id' => 'required|integer',
            'dish_name' => 'required|string',
            'ingredients' => 'required|array',
        ]);

        $selectedIngredients = array_filter($validated['ingredients'], function ($ingredient) {
            return isset($ingredient['selected']) && $ingredient['selected'] == true;
        });

        if (empty($selectedIngredients)) {
            return response()->json([
                'status' => 'error',
                'message' => 'No ingredients selected for ordering.',
            ], 400);
        }

        Order::create([
            'dish_id' => $validated['dish_id'],
            'dish_name' => $validated['dish_name'],
            'ingredients' => json_encode($selectedIngredients),
        ]);

        return redirect()->back()->with([
            'status' => 'success',
            'message' => 'Your order has been placed successfully.',
        ]);
    }


}
