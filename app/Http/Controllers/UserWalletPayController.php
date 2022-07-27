<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin\ShippingCharge;
use App\Models\Billing;
use Session;
use \App\Mail\SendMail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use App\Models\Cart;
use App\Models\MlmUser;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\WalletPay;
use App\Models\Coupon;
use App\Models\Referal;
use App\Models\MCTPay;
use App\Models\OfflinePay;
use App\Models\OrderItem;
use App\Models\SelfPick;
use App\Models\Ranking;
use App\Models\PvPoint;
use App\Models\Shipping;
use App\Models\MLMLoyalityPoint;;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserWalletPayController extends Controller
{
    public function credit_wallet_pay()
	{
		//echo 'Hello';
		$data['result']=Cart::join('products','products.id','=','carts.product_id','left')
		                    ->select('*')
		                    ->where('user_id',Auth::user()->id)
							->get();
		$data['discount']=($data['result'][0]->quantity * $data['result'][0]->pv) * (10/100) ;
		//echo '<pre>';print_r($data);die;
		return view('mlmuser.cart.walletdiscount',$data);
	}
	
	public function credit_wallet_final_payment(Request $request)
	{
		//echo '<pre>'; print_r($request->all());die;
		$id = User::where('id',Auth::user()->id)->first();
        $user_id = $id->user_id;
        if ($request->mct_pay == null && $request->offline_pay == null && $request->checkbox_credit_wallet == null) {
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
			
			$discount_amount_wallet = ($product->pv * $item->quantity) * (10/100);
			
			$total_pv   = $total_pv + ($product->pv * $item->quantity) - $discount_amount_wallet;
			
			$order_sum  = $order_sum + ($product->saleprice * $item->quantity) - $discount_amount_wallet;
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
	
		if ($request->checkbox_credit_wallet != null) {
			
			$userData = MlmUser::select('*')
			                   ->where('user_id', Auth::user()->user_id)
							   ->get();
			//echo '<pre>';print_r($userData);die;
			if($userData[0]['wallet'] >=  $total)
			{
			    
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
			
			$deduction = MLMUser::where('user_id', Auth::user()->user_id)
			                    ->update(['wallet' => $userData[0]['wallet'] - $total]);
								
			$loyalityPoints = MLMLoyalityPoint::select('*')
			                                  ->where('user_id',$userData[0]['sponser_id'])
											  ->get();
			//echo '<pre>';print_r($loyalityPoints);die;
			if(count($loyalityPoints)>0)
			{
				$update = MLMLoyalityPoint::where('user_id',$userData[0]['sponser_id'])
											  ->update(['loyality_point' => ($loyalityPoints[0]['loyality_point'])+ $discount_amount_wallet]);
			}
			else
			{
				MLMLoyalityPoint::create([
                'user_id'       => $userData[0]->sponser_id,
                'loyality_point' => $discount_amount_wallet,
                'status'        => 1
            ]);
			}
								
            WalletPay::create([
                'user_id'       => Auth::user()->id,
                'order_id'      => $order_id,
                'amount'        => $total,
                'pay_at'        => date('Y-m-d')
            ]);

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
		else{
			echo json_encode(['status' => 'danger', 'message' => 'You Does Not Have Sufficient Funds In Wallet To Purchase']);
		}
		}
	}
}