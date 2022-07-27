<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Redirect;
use App\Models\Admin\ShippingCharge;

class AdminShippingController extends Controller
{
    public function ShippingView()
    {
        $active='shipping_charge';
        $shipping = ShippingCharge::all();
        return view('admin.shippingcharge',compact('shipping','active'));
    }
    public function ShippingStore(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'country' => 'required|unique:shipping_charges,country',
            'amount' => 'required|numeric'
        ]);
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $shipping = new ShippingCharge();
        $shipping->country = $request->country;
        $shipping->amount = $request->amount;
        $shipping->save();
          return redirect()->back()->with('success', 'Shipping Charge created');
    }
    public function destroy($id)
    {
        $shipping = ShippingCharge::where('id', '=', $id)->first();
        $shipping->delete();
        return redirect()->back()->with('error', 'Shipping Charge Deleted');
    }
}
