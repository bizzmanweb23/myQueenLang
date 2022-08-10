<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin\ShippingCharge;
use App\Models\User;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class UpdateReferalContoller extends Controller
{
   public function updateReferal()
   {
	   $unique_id = User::orderBy('id', 'asc')->limit(10000)->offset(12013)->get()->toArray();
	   //echo '<pre>'; print_r($unique_id);
	   $j = 12014; // where you want yo start
	   for($i=0; $i<=count($unique_id); $i++)
	  {
		  //$get = User::where('id',$unique_id[$i]['id'])->get();
		   $nextNumber = 'MQRF000000' . $j;
		   $j++;
		  
		  $up = User::where('id',$unique_id[$i]['id'])->update(['referal_code' => $nextNumber]);
	  }
   }
}