<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DishType;

class DishtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dishTypes = DishType::all();
        return view('admin.dish_type.index', compact('dishTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'type_name' => 'required|string|max:256',
        ]);

        DishType::create($request->all());

        return redirect()->back()->with('success', 'Dish Type Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'type_name' => 'required|string|max:256'
        ]);
        $dishType = DishType::find($id);
        $dishType->update($request->all());
        return redirect()->back()->with('success', 'Dish Type Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $dishType = DishType::find($id);
        $dishType->delete();
        return redirect()->back()->with('success', 'Dish Type Deleted Successfully');
    }
}
