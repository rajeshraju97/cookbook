<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CuponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $coupons = Coupon::all();
        return view("admin.cupons.index", compact("coupons"));
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
        //
        $request->validate([
            'code' => 'required|string|max:256',
            'type' => 'required|string|max:256',
            'value' => 'required',
            'minimum_order_value' => 'nullable',
            'expiry_date' => 'required|date',
            'active' => 'required|boolean',

        ]);

        Coupon::create($request->all());

        return redirect()->back()->with('success', 'Coupon Added Successfully');

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
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'code' => 'required|String',
            'type' => 'required|string|in:percentage,fixed',
            'value' => 'required|numeric|min:0',
            'minimum_order_value' => 'required|numeric|min:0',
            'expiry_date' => 'required|date|after_or_equal:today',
            'active' => 'required|boolean',
        ]);

        // Find the coupon by ID
        $coupon = Coupon::findOrFail($id);

        // Update the coupon attributes
        $coupon->code = $request->input('code');
        $coupon->type = $request->input('type');
        $coupon->value = $request->input('value');
        $coupon->minimum_order_value = $request->input('minimum_order_value');
        $coupon->expiry_date = $request->input('expiry_date');
        $coupon->active = $request->input('active');

        // Save the updated coupon
        $coupon->save();

        // Redirect back with a success message
        return redirect()->route('admin.coupons.index')->with('success', 'Coupon updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        //
        $coupon = Coupon::find($id);
        $coupon->delete();
        return redirect()->back()->with('success', 'Coupon Deleted Successfully');
    }
}
