<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dishes;
use App\Models\DishType;
use Illuminate\Http\Request;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dishes = Dishes::all();
        return view("admin.dishes.index", compact("dishes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $dish_types = DishType::all();
        return view("admin.dishes.create", compact('dish_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "dish_type_id" => "required|exists:dish_types,id",
            "dish_name" => "required|string|max:256",
            'dish_image' => "required|file|mimes:png,jpg,jpeg,webp,gif|max:3048", // Corrected validation
            "dish_description" => "required|string",


        ]);
        $dishes = new Dishes;
        $dishes->dish_type_id = $request->dish_type_id;
        $dishes->dish_name = $request->dish_name;
        $dishes->dish_description = $request->dish_description;

        if ($request->hasFile('dish_image')) {
            $image = $request->file('dish_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();


            $directory = public_path('dishes_images');
            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }
            $image->move($directory, $imageName);
            // Save the image name to the database
            $dishes->dish_image = $imageName;
        }

        $dishes->save();

        return redirect()->route('admin.dishes.index')->with('success', 'Dish added successfully!');



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $dish = Dishes::with('dishType')->findOrFail($id); // Ensure to load the related dish type
        return response()->json($dish);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $dish = Dishes::find($id);
        $dish_types = DishType::all();
        return view('admin.dishes.edit', compact('dish', 'dish_types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        // Find the dish record
        $dish = Dishes::findOrFail($id);

        // Update dish details
        $dish->dish_type_id = $request->dish_type_id;
        $dish->dish_name = $request->dish_name;
        $dish->dish_description = $request->dish_description;

        // Check if a new image file is uploaded
        if ($request->hasFile('dish_image')) {
            $image = $request->file('dish_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $directory = public_path('dishes_images');
            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }

            // Delete the old image if it exists
            if ($dish->dish_image && file_exists($directory . '/' . $dish->dish_image)) {
                unlink($directory . '/' . $dish->dish_image);
            }

            // Move the new image to the directory
            $image->move($directory, $imageName);

            // Save the new image name to the database
            $dish->dish_image = $imageName;
        }

        // Save the updated dish record
        $dish->save();

        // Redirect with a success message
        return redirect()->route('admin.dishes.index')->with('success', 'Dish updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $dish = Dishes::find($id);

        if ($dish->dish_image && file_exists(public_path('dishes_images/' . $dish->dish_image))) {
            unlink(public_path('dishes_images/' . $dish->dish_image));
        }

        $dish->delete();
        return redirect()->route('admin.dishes.index')->with('success', 'Dish deleted successfully!');
    }
}
