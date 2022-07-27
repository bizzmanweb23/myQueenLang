<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Helper;
use App\Models\MlmUser;
use Illuminate\Http\Request;
use App\Http\Controllers\OrderController;
use App\Models\Billing;
use App\Models\Branch;
use App\Models\DirectSponsor;
use App\Models\Inventory;
use App\Models\MatchingBonus;
use App\Models\MCTPay;
use App\Models\MLMRegister;
use App\Models\OfflinePay; 
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\LeaderShipBonus;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\PvPoint;
use App\Models\SelfPick;
use App\Models\Shipping;
use App\Models\User;
use App\Models\Warehouse;
use App\Models\Ranking;
use App\Models\UseOfPv;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
use Redirect;


class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data['result'] = Order::select(
            'orders.id',
            'orders.order_unique',
            'orders.order_sum',
            'orders.discount_amount',
            'orders.shipping_charge',
            'orders.total',
            'orders.payment_status',
            'orders.status_id',
            'status.name as status',
            'user.name as customer_name',
            'orders.created_at as date'
        )
            ->leftjoin('order_statuses as status', 'orders.status_id', '=', 'status.id')
            ->leftjoin('users as user', 'orders.user_id', '=', 'user.id')
            ->OrderBy('id', 'desc')->get();	
        //echo '<pre>'; print_r($data);die;			
        $active = "";
        return view('admin.orders.index',$data)->with('active',$active);        
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Order::select(
            'orders.id',
            'orders.order_unique',
            'orders.order_sum',
            'orders.discount_amount',
            'orders.shipping_charge',
            'orders.total',
            'orders.payment_status',
            'orders.status_id',
            'status.name as status',
            'user.name as customer_name',
            'orders.created_at as date'
        )
            ->leftjoin('order_statuses as status', 'orders.status_id', '=', 'status.id')
            ->leftjoin('users as user', 'orders.user_id', '=', 'user.id')
            ->OrderBy('id', 'desc')->get();
			//echo '<pre>'; print_r($data);die;
        echo json_encode($data);
    }
    public function show_order_details($id)
    {
		//echo '<pre>';print_r($id);die;
        $order_status = OrderStatus::all();
       $branch = Branch::all();

        $check = SelfPick::where('order_id', $id)->first();
        $order_data = Order::find($id);
		//echo '<pre>';print_r($order_data);die;

        if ($order_data) {
            $user = User::find($order_data->user_id);
            //dd($user);

            if ($check) {
                $order_summary = [
                    'order_id' => $order_data->id,
                    'order_no' => $order_data->order_unique,
                    'order_date' => $order_data->created_at,
                    'name'  => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'total_order_amount' => $order_data->total,
                    'shipping_address' => $check->country . ', ' . $check->state . ', ' . $check->zip,
                    'billing_address' => $check->country . ', ' . $check->state . ', ' . $check->zip,
                    'shipping_method' => $order_data->shipping_method,
                    'payment_method' => $order_data->payment_method,
                    'sub_total' => $order_data->order_sum,
                    'shipping_charge'   => $order_data->shipping_charge,
                    'coupon_discount'   => $order_data->how_may_discount . " " . $order_data->discount_type,
                    'total_amount' => $order_data->total,
                    'in_house_status' => $order_data->in_house_status,
                    'status_id' => $order_data->status_id,
                    'payment_status' => $order_data->payment_status,
                    'self_pick_order_status' => $order_data->self_pick_order_status
                ];
            } else {
                if ($order_data->is_bill_same_ship == 1) {
                    $ship_address = Order::join('billings', 'billings.id', '=', 'orders.billing_id')
                        ->select('billings.first_name as firstname', 'billings.address', 'billings.country', 'billings.state', 'billings.zip')
                        ->where('orders.id', $id)->first();
                    $billing_address = Order::join('billings', 'billings.id', '=', 'orders.billing_id')
                        ->select('billings.first_name as firstname', 'billings.address', 'billings.country', 'billings.state', 'billings.zip')
                        ->where('orders.id', $id)->first();
                } else {
                    $ship_address = Order::join('shippings', 'shippings.id', '=', 'orders.shipping_id')
                        ->select('shippings.first_name as firstname', 'shippings.address', 'shippings.country', 'shippings.state', 'shippings.zip')
                        ->where('orders.id', $id)->first();
                    $billing_address = Order::join('billings', 'billings.id', '=', 'orders.billing_id')
                        ->select('billings.first_name as firstname', 'billings.address', 'billings.country', 'billings.state', 'billings.zip')
                        ->where('orders.id', $id)->first();

                        $active = "";
                        return view('admin.show_order_details',$data)->with('active',$active);
                        
                }


                $order_summary = [
                    'order_id' => $order_data->id,
                    'order_no' => $order_data->order_unique,
                    'order_date' => $order_data->created_at,
                    'name'  => $ship_address->firstname . ' ' . $ship_address->lastname,
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'total_order_amount' => $order_data->total,
                    'shipping_address' => $ship_address->address . ", " . $ship_address->country . ', ' . $ship_address->state . ', ' . $ship_address->zip,
                    'billing_address' => $billing_address->address . ', ' . $billing_address->country . ', ' . $billing_address->state . ', ' . $billing_address->zip,
                    'shipping_method' => $order_data->shipping_method,
                    'payment_method' => $order_data->payment_method,
                    'sub_total' => $order_data->order_sum,
                    'shipping_charge'   => $order_data->shipping_charge,
                    'coupon_discount'   => $order_data->how_may_discount . " " . $order_data->discount_type,
                    'total_amount' => $order_data->total,
                    'in_house_status' => $order_data->in_house_status,
                    'status_id' => $order_data->status_id,
                    'payment_status' => $order_data->payment_status,
                    'self_pick_order_status' => $order_data->self_pick_order_status
                ];
            }

            $order_details = Order::join('order_items', 'order_items.order_id', '=', 'orders.id')
                ->join('products', 'products.id', '=', 'order_items.product_id')
                ->select(
                    'products.title',
                    'products.productimagee as image',
                    'order_items.quantity as qun',
                    'orders.shipping_method',
                    'products.saleprice'
                )
                ->where('orders.id', $id)->get();
				//echo '<pre>';print_r($order_details);die;

            $show_pay_btn = 0;
            $payment_id = 0;
            $pay_now = OfflinePay::where('order_id', $id)->first();
            if ($pay_now) {
                $show_pay_btn = 1;
                $payment_id = $pay_now->id;
            }

            $mct_pay = MCTPay::where('order_id', $id)->first();
            if ($mct_pay) {
                $show_pay_btn = 2;
                $payment_id = $mct_pay->id;
            }
            return view('admin.orders.orderDetails')->with(
                [
                    'order_status'      => $order_status,
                    'branch'            => $branch,
                    'order_summary'     => $order_summary,
                    'order_details'     => $order_details,
                    'show_pay_btn'      => $show_pay_btn,
                    'payment_id'        => $payment_id
                ]
            );
        } else {
            return view('404.index');
        }
    }

    public function delete_Order()
    {
        request()->validate([
            'id' => 'required|exists:orders,id'
        ], [
            'id.required' => 'Something Wrong Please Refresh',
        ]);
        Order::find(request()->id)->delete();
        OrderItem::where('order_id', request()->id)->delete();
        echo json_encode(['status' => 'success', 'message' => 'Order Delete Successfully']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		//echo '<pre>';print_r($user);die;
        $request->validate([
            'order_id' => 'required|exists:orders,id',
        ]);

        $order =  Order::where('id', $request->order_id)->first();
        $user = User::find($order->user_id);

        if ($request->update_payment == 1) {
            Order::where('id', $request->order_id)->update([
                'payment_status' => $request->status_id
            ]);
        }
        if ($request->update_pick_point == 1) {
            Order::where('id', $request->order_id)->update([
                'in_house_status' => $request->status_id
            ]);
        }
        if ($request->update_self_pick_order_status == 1) {
            Order::where('id', $request->order_id)->update([
                'self_pick_order_status' => $request->status_id,
                'status_id' => $request->status_id
           
            ]);

            if ($request->status_id == 5) {
				//echo 'hello1';
                $this->remove_from_stock($request->order_id);
                $this->get_pv_point($request->order_id);
                   $this->mlm_auto_upgrade($user);
				   $this->update_pv_point($request->order_id);
                    $this->get_direct_sponser($request->order_id);
                    $this->commissionbonus($request->order_id);
                   $this->leadershipbonus($request->order_id);
            }
        }


        if ($request->update_order_status == 1) {
            // Order::where('id', $request->order_id)->update([
            //     'status_id' => $request->status_id
            // ]);

            // remove item from stock
            if ($request->status_id == 5) {
				//echo 'hello2';
                $this->remove_from_stock($request->order_id);
                $this->get_pv_point($request->order_id);
                    $this->mlm_auto_upgrade($user);
					$this->update_pv_point($request->order_id);
                    $this->get_direct_sponser($request->order_id);
                    //$this->get_matching_bonus($order->user_id, $request->order_id);
                   $this->commissionbonus($request->order_id);
                    $this->leadershipbonus($request->order_id);
            }
        }

        echo json_encode(['status' => 'success', 'message' => 'Status Update Successfully']);
    }
	
	public function update_pv_point($orderID)
    {
		//echo $orderID;die;
		$data=Order::select('*')->where('id',$orderID)->get();
		//echo '<pre>'; print_r($data);die;
		$result= MlmUser::select('*')->where('user_id',$data[0]->user_unique)->get();
		//echo '<pre>'; print_r($result);die;
		$total=$data[0]->total + $result[0]->total_pv_point;
		//echo '<pre>'; print_r($total);die;
		if($data[0]->self_pick_order_status == 5)
		{
			MlmUser::where('user_id',$data[0]->user_unique)->update(['total_pv_point' => $total]);
		}
	}	

    public function mlm_auto_upgrade($user)
    {
		//echo $user;die;
		$data=MlmUser::select('*')->where('user_id',$user->user_id)->get();
		//echo '<pre>'; print_r ($data);die;
        $total_pv = $data[0]->total_pv_point;
        $rank = Ranking::orderBy('id', 'desc')->get();
        if($total_pv >= 88 && $total_pv < 500)
		{
			MlmUser::where('user_id',$user->user_id)->update(['rank_id' => 1]);
			echo "Normal";
		}
		if($total_pv >= 500 && $total_pv < 1000)
		{
			MlmUser::where('user_id',$user->user_id)->update(['rank_id' => 2]);
			echo "Silver";
		}
		if($total_pv >= 1000 && $total_pv < 2000)
		{
			MlmUser::where('user_id',$user->user_id)->update(['rank_id' => 3]);
			echo "Gold";
		}
		if($total_pv >= 2000)
		{
			MlmUser::where('user_id',$user->user_id)->update(['rank_id' => 4]);
			echo "Diamond";
		}
    }


    public function commissionbonus($order)
    {
		//echo '<pre>';print_r($order);die;
        $result = Order::join('mlm_users as mlm', 'mlm.user_id', '=', 'orders.user_unique', 'left')
            ->select('mlm.member_id', 'mlm.sponser_id', 'orders.order_unique', 'mlm.user_id')
            ->where('orders.id', '=', $order)
            ->where('orders.status_for_matching_bonus', '=', '0')
            //->where('orders.status_for_old_order','=','1')
            ->first();
			//echo '<pre>'; print_r($result);die;
        $data = Order::select('orders.user_id', 'orders.total_pv')
            ->where('orders.id', '=', $order)
            ->where('orders.status_for_matching_bonus', '=', '0')
            //->where('orders.status_for_old_order','=','1')
            ->first();
        //echo '<pre>';print_r($data);die;
        $getParentDetails = MlmUser::select('placement_id', 'rank_id')
            ->where('mlm_users.user_id', '=', $result->user_id)
            ->first();
			//echo '<pre>';print_r($getParentDetails);die;
        $getParentSponserDetails = MlmUser::select('sponser_id','rank_id')
            ->where('mlm_users.user_id', '=', $getParentDetails->placement_id)
            ->first();
			//echo '<pre>';print_r($getParentSponserDetails);die;
        $getSponserDetails = MlmUser::select('sponser_id', 'rank_id', 'user_id')
            ->where('mlm_users.user_id', $getParentSponserDetails->sponser_id)
            ->first();
			//echo '<pre>';print_r($getSponserDetails);die;
        $placementID = $getParentDetails->placement_id;
		//echo '<pre>';print_r($placementID);die;

        $checkOrders = Helper::getparentdetails($placementID, $result->user_id);
		//echo '<pre>'; print_r($checkOrders);die;
            //exit;

        // $pvPoint = [];
        if ($checkOrders[0] != 0) {
            if ($checkOrders[0] == 1) {
                if ($checkOrders[1] < $data->total_pv) {
                     $pvPoint = $checkOrders[1];
                } else {
                    $pvPoint = $data->total_pv;
                }
            } else if ($checkOrders[0] == 2) {
                if ($checkOrders[1] < $data->total_pv) {
                    $pvPoint = $checkOrders[1];
                } else {
                    $pvPoint = $data->total_pv;
                }
            }
            else if ($checkOrders[0] == 3) {
                $pvPoint = 0;
            }
            
            //echo '<pre>'; print_r($pvPoint);die;
            //exit;

            $pvPointTotal[$data['user_id']] = $data->total_pv + $checkOrders[1];
            
            if ($getParentSponserDetails->rank_id == 1) {
                $percent = 6;
                $commissionBonus = ($pvPoint * $percent) / 100;
            }
            if ($getParentSponserDetails->rank_id == 2) {
                $percent1 = 8;
                $commissionBonus = ($pvPoint * $percent1) / 100;
            }
            if ($getParentSponserDetails->rank_id == 3) {
                $percent2 = 10;
                $commissionBonus = ($pvPoint * $percent2) / 100;
            }
            if ($getParentSponserDetails->rank_id == 4) {
                $percent3 = 12;
                $commissionBonus = ($pvPoint * $percent3) / 100;
            }
            $bonusArray = array(
                'sponser_id' => $result->sponser_id,
                'member_id' => $result->member_id,
                'user_id' => $placementID,
                'point' => $commissionBonus,
				'order_id'=> $order,
				'status'=>1,
                'created_at' => DB::raw('CURRENT_TIMESTAMP'),
                'updated_at' => DB::raw('CURRENT_TIMESTAMP')
            );
            //echo '<pre>';print_r($bonusArray);die;
			//$this->leadershipbonus($order);
            $storeMatchingBonus = MatchingBonus::insert($bonusArray);
			$updateMatchingPoints = MlmUser::where('user_id', $result->sponser_id)
            ->update(['total_matching_bonus' => $commissionBonus]);
            $sponserCommissionBonus=0;
            if ($getSponserDetails->rank_id == 1) {
                   $per = 6;
                   $sponserCommissionBonus = ($commissionBonus * $per) / 100;
                }
            if ($getSponserDetails->rank_id == 2) {
                 $per1 = 8;
                $sponserCommissionBonus = ($commissionBonus * $per1) / 100;
                }
            if ($getSponserDetails->rank_id == 3) {
                 $per2 = 10;
                 $sponserCommissionBonus = ($commissionBonus * $per2) / 100;
             }
            if ($getSponserDetails->rank_id == 4) {
                 $per3 = 12;
                 $sponserCommissionBonus = ($commissionBonus * $per3) / 100;
            }
			//echo '<pre>';print_r($sponserCommissionBonus);die;
             $sponserBonusArray = array(
                 'sponser_id' => $getSponserDetails->sponser_id,
                 'member_id' => $getParentSponserDetails->sponser_id,
                 'user_id' => $getSponserDetails->user_id,
                 'point' => $sponserCommissionBonus,
				 'status'=>1,
                 'created_at' => DB::raw('CURRENT_TIMESTAMP'),
                 'updated_at' => DB::raw('CURRENT_TIMESTAMP')
             );
            //echo '<pre>'; print_r($sponserBonusArray);die;
            $storeMatchingBonus = MatchingBonus::insert($sponserBonusArray);
			$updateMatchingPoints = MlmUser::where('user_id', $getSponserDetails->sponser_id)
            ->update(['total_matching_bonus' => $sponserCommissionBonus]);

            $parentdetail = Helper::getchildparentdetails($placementID, $checkOrders[0], $data->placement_id_type, $pvPointTotal);
            
            $data=MlmUser::select('mlm_users.left_id','mlm_users.right_id','mlm_users.user_id','mlm_users.id','left.id as leftId','right.id as rightId')
            ->join('mlm_users as left','left.user_id','=','mlm_users.left_id','left')
            ->join('mlm_users as right','right.user_id','=','mlm_users.right_id','left')
            ->where('mlm_users.user_id','=',$placementID)			   
            ->first();
			//echo '<pre>';print_r($data);die;

            if(isset($data->left_id) && isset($data->right_id)){
                if ($checkOrders[0] != 3) {
                    
                    $left = $right = 0;

                    if($data->left_id != ''){
                        $left_data=Order::select('orders.order_unique','orders.total_pv')
                        ->where('orders.user_unique','=',$data->left_id)
                        //->whereNull('in_house_status')
                        ->where('orders.self_pick_order_status','=','5')
                        ->where('orders.status_for_matching_bonus','=','0')
                        ->where('orders.status_for_old_order','=','1')->first();
						//echo '<pre>';print_r($left_data);die;
                        $left = $left_data->total_pv;
                    }

                    if($data->right_id != ''){
                        $right_data=Order::select('orders.order_unique','orders.total_pv')
                        ->where('orders.user_unique','=',$data->right_id)
                        //->whereNull('in_house_status')
                        ->where('orders.self_pick_order_status','=','5')
                        ->where('orders.status_for_matching_bonus','=','0')
                        ->where('orders.status_for_old_order','=','1')->first();
						//echo '<pre>';print_r($right_data);die;
                        $right = $right_data->total_pv;
						
                    }

                    if($left > $right){
                        Order::where('order_unique', $right_data->order_unique)->update(['status_for_matching_bonus' => 1]);
                    }

                    if($left < $right){
                        Order::where('order_unique', $left_data->order_unique)->update(['status_for_matching_bonus' => 1]);
                    }

                    if($left == $right){
                        Order::where('order_unique', $right_data->order_unique)->update(['status_for_matching_bonus' => 1]);
                        Order::where('order_unique', $left_data->order_unique)->update(['status_for_matching_bonus' => 1]);
                    }

                    if($data->right_id != ''){
                        Order::where(['user_unique'=>$data->right_id,'self_pick_order_status'=>5,'status_for_old_order'=>1])->update(['status_for_old_order'=>2]);
                    }
                    if($data->left_id != ''){
                        Order::where(['user_unique'=>$data->left_id,'self_pick_order_status'=>5,'status_for_old_order'=>1])->update(['status_for_old_order'=>2]);
                    }
                }
            }

        }
    }


    public function get_direct_sponser($order_id)
    {
		//echo '<pre>';print_r($order_id);die;
        $order = Order::where('id', $order_id)->first();
        $user = User::find($order->user_id);
		//echo '<pre>';print_r($order);die;

        $total_pv = $order->total_pv;
        if ($order->status_for_direct_bonus == 0) {
            $sponsors_id = MlmUser::where('user_id', $user->user_id)->first();
			//echo '<pre>';print_r($sponsors_id);die;
            if ($sponsors_id && !empty($sponsors_id->sponser_id)) {
                // add in DirectSponsor table
                $sponsors_user = MlmUser::where('user_id', $sponsors_id->sponser_id)->first();
				$user_details= User::where('user_id', $sponsors_user->user_id)->first();
                //echo '<pre>';print_r($sponsors_user);die;
                if ($sponsors_user->rank_id == 1) {
                    $per = 10;
                    $direct_cal = ($per / 100) * $total_pv;
                } else if ($sponsors_user->rank_id == 2) {
                    $per = 15;
                    $direct_cal = ($per / 100) * $total_pv;
                } else if ($sponsors_user->rank_id == 3) {
                    $per = 20;
                    $direct_cal = ($per / 100) * $total_pv;
                } else {
                    $per = 25;
                    $direct_cal = ($per / 100) * $total_pv;
                }
                DirectSponsor::create([
                    'sponsors_id'   => $sponsors_id->sponser_id,
                'member_id'     => $user->user_id,
                'member_name'   => $user_details->name,
                'rank_id'       => $sponsors_id->rank_id,
                'point'         => $direct_cal,
                'order_id'      => $order->id,
                ]);

                MlmUser::where('user_id', $sponsors_id->sponser_id)->update([
                    'total_direct_dponsor' => $sponsors_user->total_direct_dponsor + $direct_cal
                ]);

                Order::where('id', $order->id)->update([
                    'status_for_direct_bonus' => 1
                ]);
            }
        }
    }

    public function leadershipbonus($order)
    {
        $result = Order::join('mlm_users as MLM', 'MLM.user_id', '=', 'orders.user_unique', 'left')
            ->select('MLM.member_id','MLM.sponser_id', 'orders.order_unique', 'MLM.user_id')
            ->where('orders.id', '=', $order)
            ->where('orders.status_for_matching_bonus', '=', '1')
            ->first();
        //echo '<pre>'; print_r($result);
		if(isset($result))
		{
			$bonus=MatchingBonus::select('point')
			              -> where('order_id', $order)
						  ->where('status','=','1')
						  ->first();
			//echo '<pre>';print_r($bonus);die;
			$order_pv=$bonus['point'];
			//echo '<pre>';print_r($order_pv);
        $data = Order::select('orders.user_unique', 'orders.total_pv')
            ->where('orders.id', '=', $order)
            ->where('orders.status_of_leadership_bonus', '=', '0')
            ->first();
        $getReferalDetails = MlmUser::select('sponser_id', 'rank_id')
            ->where('mlm_users.user_id', '=', $result->sponser_id)
            ->first();
        $referalDetails = MlmUser::select('left_id', 'right_id', 'id', 'rank_id')
            ->where('mlm_users.user_id', '=', $result->user_id)
            ->first();
			//echo $referalDetails->left_id;die;
		$leadershipBonus=0;
        if (isset($referalDetails->left_id) && isset($referalDetails->right_id)) {
            if ($getReferalDetails->rank_id == 1) {
                $leadership = 0;
            }
            if ($getReferalDetails->rank_id == 2) {
                $leadership = $order_pv * (2 / 100);
            }
            if ($getReferalDetails->rank_id == 3) {
                $leadership = $order_pv * (5 / 100);
            }
            if ($getReferalDetails->rank_id == 4) {
                $leadership = $order_pv * (10 / 100);
            }
			//echo "Hello";
        }
		else
		{
			//echo "Bye";
			$leadership = 0;
		}
		  // echo "wait";
		   $leadershipBonusArray = array(
            'sponser_id' => $result->sponser_id,
            'member_id' => $result->member_id,
            'order_id' => $result->order_unique,
            'point' => $leadership,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        );
		//echo '<pre>';print_r($leadershipBonusArray);
        $storeLeaderShipBonus = LeaderShipBonus::insert($leadershipBonusArray);
        $LeaderBonusStatus = Order::where('order_unique', $result->order_unique)->update(['status_of_leadership_bonus' => 1]);
		$update=MatchingBonus::where('sponser_id',$result->sponser_id)->update(['status' => 2]);
		 $updateLeadershipPoints = MlmUser::where('user_id', $result->sponser_id)
            ->update(['leadership_bonus' => $leadership]);
		}
		else
		{
			//echo "over";
			$leadership = 0;
		}
		
		//echo $leadership;die;
    }
    
    public function get_pv_point($order_id)
    {
        $order = Order::where('id', $order_id)->first();
		//echo '<pre>';print_r($order);die;
        $user = MlmUser::where('user_id',$order->user_unique)->first();
		//echo '<pre>';print_r($user);die;
		$userID=User::where('user_id',$user->user_id)->first();
		//echo '<pre>';print_r($userID);die;
        $check = PvPoint::where('order_id', $order_id)->where('user_id', $userID->id)->first();
        if (!$check) {
            $data = Order::join('order_items', 'order_items.order_id', '=', 'orders.id')
                ->where('orders.id', $order_id)->get();

            $total_pv = $order->total_pv;
            foreach ($data as $item) {
                PvPoint::create([
                    'user_id'       => $item->user_id,
                    'product_id'    =>  $item->product_id,
                    'point'      => $item->pv * $item->quentity,
                    'order_id'      => $order_id
                ]);
            }

            MlmUser::where('user_id', $user->user_id)->update([
                'total_pv_point' => $user->total_pv_point + $total_pv
            ]);
        }
    }

    public function remove_from_stock($order_id)
    {
        $order = Order::join('order_items', 'order_items.order_id', '=', 'orders.id')
            ->where('orders.id', $order_id)->get();
        $check = SelfPick::where('order_id', $order_id)->first();
        foreach ($order as $item) {
            $country = null;
            if ($check) {
                $country = $check->country;
            } else {
                if ($item->billing_id == $item->shipping_id) {
                    $address = Billing::where('id', $item->billing_id)->first();
                    $country = $address->country;
                } else {
                    $address = Shipping::where('id', $item->shipping_id)->first();
                    $country = $address->country;
                }
            }
            $quentity = Inventory::join('warehouses', 'warehouses.id', '=', 'inventories.warehouseid')
                ->where('warehouses.country', $country)
                ->where('inventories.productid', $item->product_id)
                ->where('inventories.stock', '>', 0)
                ->first();

            if ($quentity) {
                Inventory::join('warehouses', 'warehouses.id', '=', 'inventories.warehouseid')
                    ->where('warehouses.country', $country)
                    ->where('inventories.productid', $item->product_id)
                    ->where('inventories.stock', '>', 0)
                    ->update([
                        'stock' => $quentity->stock - $item->quentity
                    ]);
            }
            // echo json_encode($country);
        }
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