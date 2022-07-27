<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Validator;
use Redirect;

class AdminCouponController extends Controller
{
    public function index()
    {
        $active = 'coupon';
        $coupon = Coupon::all();
        return view('admin.coupon', compact('active', 'coupon'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'number'     => 'required|unique:coupons,number',
            'discount_type'     => 'required',
            'discount_number'   => 'required|numeric'
        ]);
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        Coupon::create([
            'number'            => $request->number,
            'discount_type'     => $request->discount_type,
            'discount_number'   => $request->discount_number
        ]);
        return redirect()->back()->with('success', 'Coupon Created Successfully');
    }

    public function delete($id)
    {
        Coupon::where('id', request()->id)->delete();
        return redirect()->back()->with('error', 'Coupon Deleted Successfully');
    }
}