<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin\ShippingCharge;
use App\Models\Billing;
use App\Models\MlmUser;
use App\Models\Cart;
use Session;
use \App\Mail\SendMail;
use App\Models\User;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use App\Models\Coupon;
use App\Models\Referal;
use App\Models\MCTPay;
use App\Models\OfflinePay;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\SelfPick;
use App\Models\Ranking;
use App\Models\PvPoint;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function validate_form(Request $request)
    {
        // check cart
        $check_cart = Cart::where('user_id', Auth::user()->id)->count();
        if (!$check_cart > 0) {
            $request->validate([
                'cart_item' => 'required'
            ], [
                'cart_item.required' => 'Please Add Some Item In cart!'
            ]);
        }
        $request->validate([
            'address_part' => 'nullable|in:2'
        ], [
            'address_part.required' => 'Please Select Address'
        ]);
        if ($request->address_part == 2) {
            if ($request->home_delivery_select != 1 && $request->self_pickup_select != 1) {
                $request->validate([
                    'select_one' => 'required'
                ], [
                    'select_one.required' => 'Please Select one Address Option'
                ]);
            }
            if ($request->home_delivery_select == 1 && $request->ship_same_with_bill != null) {
                $request->validate([
                    'firstname'  => 'required',
                    'lastname'   => 'required',
                    'country'    => 'required',
                    'address'    => 'required',
                    'city'       => 'required',
                    'state'      => 'required',
                    'zip'        => 'required|numeric',
                    'phone'      => 'required|numeric'
                ], [
                    'firstname.required'    => "Please Enter First Name",
                    'lastname.required'     => "Please Enter Last Name",
                    'country.required'      => "Please Select Country",
                    'address.required'      => "Please Enter Address ",
                    'city.required'         => "Please Enter City Name",
                    'state.required'        => "Please Enter State Name",
                    'zip.required'          => "Please Enter ZIP Code",
                    'phone.required'        => 'Please Enter Phone Number',
                    'zip.numeric'           => 'Invalid Zip'
                ]);
            }
            if ($request->home_delivery_select == 1 && $request->ship_same_with_bill == null) {
                $request->validate([
                    'firstname'  => 'required',
                    'lastname'   => 'required',
                    'country'    => 'required',
                    'address'   => 'required',
                    'city'      => 'required',
                    'state'     => 'required',
                    'zip'       => 'required|numeric',
                    'phone'     => 'required|numeric',

                    'first_name_ship'    => 'required',
                    'last_name_ship'    => 'required',
                    'country_ship'    => 'required',
                    'address_ship'   => 'required',
                    'city_ship'      => 'required',
                    'state_ship'     => 'required',
                    'zip_ship'       => 'required|numeric',
                    'phone_ship'     => 'required|numeric'
                ], [
                    'firstname.required'    => "Please Enter First Name",
                    'lastname.required'     => "Please Enter Last Name",
                    'country.required'      => "Please Select Country",
                    'address.required'      => "Please Enter Address ",
                    'city.required'         => "Please Enter City Name",
                    'state.required'        => "Please Enter State Name",
                    'zip.required'          => "Please Enter ZIP Code",
                    'phone.required'        => 'Please Enter Phone Number',
                    'zip.numeric'           => 'Invalid Zip',

                    'first_name_ship.required'    => "Please Enter First Name",
                    'last_name_ship.required'     => "Please Enter Last Name",
                    'country_ship.required'      => "Please Select Country",
                    'address_ship.required'      => "Please Enter Address ",
                    'city_ship.required'         => "Please Enter City Name",
                    'state_ship.required'        => "Please Enter State Name",
                    'zip_ship.required'          => "Please Enter ZIP Code",
                    'phone_ship.required'        => 'Please Enter Phone Number',
                    'zip_ship.numeric'           => 'Invalid Zip'
                ]);
            }

            if ($request->self_pickup_select == 1) {
                $request->validate([
                    'country_self'   => 'required',
                    'state_self'     => 'required',
                    'zip_self'       => 'required|numeric'
                ], [
                    'country_self.required' => "Please Select Country",
                    'state_self.required'   => 'Please Enter State',
                    'zip_self.required'     => 'Please Enter ZIP',
                    'zip_self.numeric'      => 'Invalid Zip'
                ]);
            }
        }
        echo json_encode(['status' => 'success', $check_cart]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = User::where('id',Auth::user()->id)->first();
        $user_id = $id->user_id;
        if ($request->mct_pay == null && $request->offline_pay == null) {
            $request->validate([
                'select_one_payment' => 'required',
            ], [
                'select_one_payment.required' => 'Please Select One Payment Option'
            ]);
        }

        if ($request->offline_pay != null) {
            $request->validate([
                'offline_pay_screen_shot' => 'required|image',
            ], [
                'offline_pay_screen_shot.required' => 'Please Upload Payment Screenshot Image'
            ]);
        }
        $request->validate([
            'coupon'    => 'nullable|exists:coupons,number'
        ], [
            'coupon.exists' => 'Invalid Coupon'
        ]);


        $order_number = Order::orderBy('id', 'desc')->first();
        if ($order_number == null) {
            $number = 'MQO0000001';
        } else {
            $number = str_replace('MQO', '', $order_number->order_unique);
            $number =  "MQO" . sprintf("%07d", $number + 1);
        }


        $bill_id = 0;
        $ship_id = 0;
        $is_bill_same_ship = 0;
        if ($request->home_delivery_select == 1 && $request->ship_same_with_bill != null) {
            $bill_id = Billing::insertGetId([
                'user_id'       => Auth::user()->id,
                'first_name'    => $request->firstname,
                'last_name'     => $request->lastname,
                'country'       => $request->country,
                'address'       => $request->address,
                'city'          => $request->city,
                'state'         => $request->state,
                'zip'           => $request->zip,
                'Phone'         => $request->phone,
                'created_at'    => now(),
                'updated_at'    => now()
            ]);
            $is_bill_same_ship = 1;
        }

        if ($request->home_delivery_select == 1 && $request->ship_same_with_bill == null) {
            $bill_id = Billing::insertGetId([
                'user_id'       => Auth::user()->id,
                'first_name'    => $request->firstname,
                'last_name'      => $request->lastname,
                'country'       => $request->country,
                'address'       => $request->address,
                'city'          => $request->city,
                'state'         => $request->state,
                'zip'           => $request->zip,
                'Phone'         => $request->phone,
                'created_at'    => now(),
                'updated_at'    => now()
            ]);
            $ship_id = Shipping::insertGetId([
                'user_id'       => Auth::user()->id,
                'first_name'    => $request->first_name_ship,
                'last_name'      => $request->last_name_ship,
                'country'       => $request->country_ship,
                'address'       => $request->address_ship,
                'city'          => $request->city_ship,
                'state'         => $request->state_ship,
                'zip'           => $request->zip_ship,
                'Phone'         => $request->phone_ship,
                'created_at'    => now(),
                'updated_at'    => now()
            ]);
            $is_bill_same_ship = 0;
        }

        $quantity   = Cart::where('user_id', Auth::user()->id)->sum('quantity');
        $cart       = cart::where('user_id', Auth::user()->id)->get();
        $order_sum  = 0;
        $total      = 0;
        $total_pv   = 0;
        foreach ($cart as $item) {
            $product    = Product::find($item->product_id);

            $order_sum  = $order_sum + ($product->saleprice * $item->quantity);

            $total_pv   = $total_pv + ($product->pv * $item->quantity);
        }

        $total = $order_sum;



        $coupon     = Coupon::where('number', $request->apply_coupon)->first();
        $exit       = Order::where('user_id', Auth::user()->id)->where('coupon_code', $request->apply_coupon)->first();
        $discount_type = null;
        $after_discount_amount = 0;
        $discount_amount = 0;
        $how_may_discount = 0;
        $coupon_code = null;
        if ($coupon && !$exit) {
            if ($order_sum > $coupon->discount_number) {
                if ($coupon->discount_type == 'Fixed') {
                    $total = $after_discount_amount = $total - $coupon->discount_number;
                    $discount_type = 'Fixed';
                    $discount_amount = $coupon->discount_number;
                    $how_may_discount = $coupon->discount_number;
                } else {
                    $per_cal = ($coupon->discount_number / 100) * $total;
                    $total = $after_discount_amount =  $total - $per_cal;
                    $discount_type = '%';
                    $discount_amount = $per_cal;
                    $how_may_discount = $coupon->discount_number;
                }
                $coupon_code = $request->apply_coupon;
            }
        }



        if ($request->home_delivery_select == 1) {
            $check = ShippingCharge::where('country',  $request->country)->first();
            if ($check) {
                $total = $total + $check->amount;
                $delivery_charge = $check->amount;
            } else {
                $delivery_charge = 0;
                $total = $total;
            }
            $shipping_method = "Home Delivery";
        } else {
            $delivery_charge = 0;
            $total = $total;
            $shipping_method = "Self-Pickup";
        }

        if ($request->mct_pay != null) {
            $payment_method = "MCT Pay";
        } elseif ($request->offline_pay != null) {
            $payment_method = "Pay Now";
        } else {
            $payment_method = "Credit Wallet";
        }


        $order_id = Order::insertGetId([
            'order_unique'          => $number,
            'user_id'               => Auth::user()->id,
            'user_unique'           => Auth::user()->user_id,
            'status_for_old_order'  => 1,
            'payment_method'        => $payment_method,
            'shipping_method'       => $shipping_method,
            'is_bill_same_ship'     => $is_bill_same_ship,
            'billing_id'            => $bill_id,
            'shipping_id'           => $ship_id,
            'user_ip'               => $request->ip(),
            'order_currency'        => '$',
            'quantity'              => $quantity,
            'order_sum'             => $order_sum,
            'total_pv'              => $total_pv,
            'coupon_code'           => $coupon_code,
            'discount_amount'       => $discount_amount,
            'how_may_discount'      => $how_may_discount,
            'discount_type'         => $discount_type,
            'after_discount_price'  => $after_discount_amount,
            'shipping_charge'       => $delivery_charge,
            'payment_status'        => 0,
            'total'                 => $total,
            'created_at'            => now(),
            'updated_at'            => now()
        ]);

        // add payment screenshot image 
        if ($request->offline_pay != null) {
            $screen_shot = $request->offline_pay_screen_shot->storeAs('Offline_pay', "order_id_" . $order_id . "." . $request->offline_pay_screen_shot->extension());
            OfflinePay::create([
                'user_id'       => Auth::user()->id,
                'order_id'      => $order_id,
                'screen_shot'   => $screen_shot,
                'status'        => 0
            ]);
        }

        if ($request->mct_pay != null) {
            MCTPay::create([
                'user_id'       => Auth::user()->id,
                'order_id'      => $order_id,
                'amount'        => $total,
                'status'        => 0
            ]);
        }

        // add to order item
        foreach ($cart as $item) {
            $product = Product::find($item->product_id);
            OrderItem::create([
                'user_id'       => Auth::user()->id,
                'order_id'      => $order_id,
                'product_id'    => $product->id,
                'price'         => $product->saleprice,
                'pv'            => $product->pv,
                'quantity'      => $item->quantity
            ]);

            Cart::where('id', $item->id)->delete();
        }

        if ($request->self_pickup_select == 1) {
            SelfPick::create([
                'user_id' => Auth::user()->id,
                'order_id' => $order_id,
                'country'   => $request->country_self,
                'state'     => $request->state_self,
                'zip'       => $request->zip_self
            ]);
        }
        $ref="MQRF0000001";
        $referal_code = Referal::where('id', Auth::user()->id)->first();
        if($referal_code){$ref = $referal_code->referal_code;}
        $ref="MQRF0000031";


        $image = \QrCode::format('png')
            ->size(200)->errorCorrection('H')
            ->generate(url('/register?referal_code=' . $ref));

            
        $output_file = '/referal_qr_code/img-' . time() . '.png';
        Storage::disk('local')->put($output_file, $image);
        MlmUser::where('user_id',$user_id)->where('mlm_status','0')->update([
            'mlm_status' => '1',
            'qrcode' => $output_file,
        ]);

            // PvPoint::create([
            //     'user_id' => Auth::user()->id,
            //     'product_id' => $product->id,
            //     'point' => $product->pv,
            //     'order_id' => $order_id
            // ]);
             // add to pv point
        foreach ($cart as $item) {
            $product = Product::find($item->product_id);
            PvPoint::create([
                'user_id'       => Auth::user()->id,
                'order_id'      => $order_id,
                'product_id'    => $product->id,
                'point'         => $product->pv
            ]);
        }
        $referal_code_value = Session::get('referal_code') ? Session::get('referal_code') : 'MQRF0000001';
        // $referal_data = Referal::where('id','1')->first();
        // $referal_data_code =  $referal_data->referal_code;
        // $referal_data_code =  'MQRF0000001';
        if($referal_code_value != 'MQRF0000001'){
           // print_r($referal_code_value);
            //print_r('if');exit();
        $user = MlmUser::where('referal_code',$referal_code_value)->first();
            //print_r($user_mail_id);exit;   
            $ref =  $user->email_id;
            $email = $user->email_id;
            $details = [
                //'referal_code' => $referal_code_value ?? $data['referal_code'] ?? $referal_data_code,
                'title' => 'U have to choose placement',
                'body' =>  url('/placement?email_id=' . $ref),
            ];
            \Mail::to($email)->send(new SendMail($details));
        }
           //return redirect()->route('Mlm-Dashboard')->with('warning', 'Referal Link Shared Sucessfully!');

       //sendMail

        //     $referal_code_value = Session::get('referal_code');
        // $user = MlmUser::where('referal_code',$referal_code_value)->first();
        //     //print_r($user_mail_id);exit;
        //     $ref =  $user->email_id;
        //     $email = $user->email_id;
        //     $details = [
        //         'title' => 'U have to choose placement',
        //         'body' =>  url('/register?referal_code=' . $ref),
        //     ];
        //     \Mail::to($email)->send(new SendMail($details));
        

        echo json_encode([
            'status' => 'success',
            'message' => 'Just wanted to say thank you for your purchase. We’re so lucky to have customers like you',
            'order_id' => $order_id
        ]);
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