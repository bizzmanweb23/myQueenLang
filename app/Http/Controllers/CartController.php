<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\MlmUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['result']= MlmUser::select('*')->where('user_id',Auth::user()->user_id)->get();
		//$data['']
        return view('mlmuser.cart.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = Cart::join('products', 'products.id', '=', 'carts.product_id')
            ->select('products.productimagee as image', 'products.title', 'carts.quantity', 'products.saleprice', 'products.id as product_id', 'carts.id as cart_id')
            ->where('carts.user_id', Auth::user()->id)->get();

        echo json_encode($data);
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
            'product_id' => 'required|exists:products,id',
        ], [
            'product_id.required'  => "Please Refresh Something Wrong"
        ]);

        $check = Cart::where('product_id', $request->product_id)->where('user_id', Auth::user()->id)->first();
        if ($check) {
            Cart::where('product_id', $request->product_id)->where('user_id', Auth::user()->id)->update([
                'quantity' => $check->quantity + $request->quantity
            ]);
        } else {
            Cart::create([
                'user_id'       => Auth::user()->id,
                'product_id'    => $request->product_id,
                'quantity'      => $request->quantity,
                'status'        => 1
            ]);
        }

        echo json_encode(['status' => 'success', 'message' => 'Product Add Successfully']);
    }

    public function update_cart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'cart_id'    => 'required|exists:carts,id',
            'quantity'   =>  'required'
        ], [
            'product_id.required' => 'Please Refresh Something Wrong',
            'cart_id.required'    => 'Please Refresh Something Wrong',
            'quantity.required'   => 'Please Add Quantity'
        ]);


        Cart::where('id', $request->cart_id)->where('product_id', $request->product_id)->where('user_id', Auth::user()->id)->update([
            'quantity' => $request->quantity
        ]);

        $show =  Cart::join('products', 'products.id', '=', 'carts.product_id')
            ->select('products.title', 'carts.quantity')
            ->where('carts.id', $request->cart_id)
            ->where('carts.product_id', $request->product_id)
            ->where('carts.user_id', Auth::user()->id)->first();

        echo json_encode(['status' => 'success', 'message' => "You changed '" . $show->title . "' QUANTITY to '" . $show->quantity . "'"]);
    }

    public function delete_from_cart(Request $request)
    {
        $request->validate([
            'product_id'    => 'required|exists:products,id',
            'cart_id'       => 'required|exists:carts,id'
        ], [
            'product_id.required' => 'Please Refresh Something Wrong',
            'cart_id.required'    => 'Please Refresh Something Wrong',
        ]);

        Cart::where('id', $request->cart_id)->where('product_id', $request->product_id)->where('user_id', Auth::user()->id)->delete();

        echo json_encode(['status' => 'success', 'message' => 'Successfully removed']);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}