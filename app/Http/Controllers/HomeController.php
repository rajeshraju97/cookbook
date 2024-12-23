<?php

namespace App\Http\Controllers;

use App\Models\Dishes;
use App\Models\DishType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //


    public function index(Request $request, $type_id = null)
    {
        // Fetch categories and group them by category name
        $categories = DishType::all()->groupBy('category_name');

        // Determine the default type_id if not provided
        if (!$type_id) {
            $firstDishType = DishType::first(); // Get the first dish type
            $type_id = $firstDishType ? $firstDishType->id : null; // Fallback if no dish types exist
        }

        // Get dishes for the selected type or all dishes if no type is selected
        $query = Dishes::query();

        // If a valid dish type ID is provided, filter by dish type
        if ($type_id && is_numeric($type_id)) {
            $query->where('dish_type_id', $type_id);
        }

        // Apply search if a search term is present
        if ($request->has('search') && $request->search != '') {
            $query = Dishes::query();
            $searchTerm = trim($request->search); // Clean up spaces
            $searchTerm = str_replace('+', ' ', $searchTerm); // Handle '+' as a space

            // Search for dishes where the name matches the search term (case insensitive)
            $query->where('dish_name', 'like', '%' . strtolower($searchTerm) . '%');

            // dd($query->toSql(), $query->getBindings());
        }

        // Apply sorting if provided
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'top_rated':
                    $query->orderBy('rating', 'desc');
                    break;
                case 'trending':
                    $query->orderBy('popularity', 'desc');
                    break;
                default:
                    $query->orderBy('created_at', 'desc');
            }
        }

        // Paginate the results (use the same query that has filtering and sorting applied)
        $dishes = $query->paginate(1);

        // Pass data to the view
        return view('welcome', [
            'categories' => $categories,
            'dishes' => $dishes,
            'selectedTypeId' => $type_id,
        ]);
    }





    public function signin()
    {
        return view('auth.sign-in');
    }

    public function signup()
    {
        return view('auth.sign-up');
    }

    public function recipe_index(Request $request, $type_id = null)
    {
        // Fetch categories and dish types
        $categories = DishType::all()->groupBy('category_name');

        // Determine the default type_id if not provided
        if (!$type_id) {
            $firstDishType = DishType::first(); // Get the first dish type
            $type_id = $firstDishType ? $firstDishType->id : null; // Fallback if no dish types exist
        }

        // Get dishes for the selected type or all dishes if no type is selected
        $query = Dishes::query();

        // Check if a valid dish type ID is provided
        if ($type_id && is_numeric($type_id)) {
            $query->where('dish_type_id', $type_id);
        }

        // Apply search if a search term is present
        if ($request->has('search') && $request->search != '') {
            $query = Dishes::query();
            $searchTerm = trim($request->search); // Clean up spaces
            $searchTerm = str_replace('+', ' ', $searchTerm); // Handle '+' as a space

            // Search for dishes where the name matches the search term (case insensitive)
            $query->where('dish_name', 'like', '%' . strtolower($searchTerm) . '%');

            // dd($query->toSql(), $query->getBindings());
        }

        // Get the results
        $dishes = $query->get();

        // Apply sorting
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'top_rated':
                    $query->orderBy('rating', 'desc');
                    break;
                case 'trending':
                    $query->orderBy('popularity', 'desc');
                    break;
                default:
                    $query->orderBy('created_at', 'desc');
            }
        }

        // Paginate results
        $dishes = $query->paginate(1);

        // Pass data to the view
        return view('user.recipes', [
            'categories' => $categories,
            'dishes' => $dishes,
            'selectedTypeId' => $type_id, // Pass the selected type_id to highlight it in the view
        ]);
    }



    public function search()
    {
        return view('user.search');
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function recipe_single_page($id)
    {

        $dish = Dishes::find($id);


        return view('user.recipes_single_page', compact('dish'));
    }
}
