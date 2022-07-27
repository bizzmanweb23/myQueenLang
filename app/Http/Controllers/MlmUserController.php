<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Mail\SendMail;
use App\Models\Cart;
use App\Models\User;
use App\Models\Referal;
use App\Models\MlmUser;
use App\Models\Product;
use App\Models\Ranking;
use Auth;
use Session;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class MlmUserController extends Controller
{
    public function checkPoint()
    {
        //  check pv_point
        $id = User::where('id', Auth::user()->id)->first();
       
        $user_id = $id->user_id;
        $data = Ranking::leftjoin('mlm_users', 'rankings.id', 'mlm_users.rank_id')
            ->where('user_id', $user_id)
            ->select('rankings.*', 'mlm_users.rank_id')
            ->first();


        //$pv_point = $data->points;
        return response()->json($data);
    }
    public function index()
    {
        $referal_code = Referal::where('id', Auth::user()->id)->first();
        if (!$referal_code) {
            $ref = 'N/A';
        } else {
            $ref = $referal_code->referal_code;
        }
        return view('mlmuser.index', compact('ref'));
    }
    public function sendmailview()
    {
        $user = MlmUser::where('user_id',Auth::user()->user_id)->first();
        $referal_code = Referal::where('user_id', Auth::user()->user_id)->first();
        if (!$referal_code) {
            $ref = 'N/A';
        } else {
            $ref = $referal_code->referal_code;
        }
        return view('mlmuser.referal', compact('ref','user'));
    }
     public function userDetailsView()
    {
        $user = User::where('id', Auth::id())->first();
        $referal_code = $user->referal_code;
        $matched_data = Referal::where('referal_code', $user->referal_code)->first();
        $placement_id = User::where('user_id', $matched_data->user_id)->first();
		$result=MlmUser::select('member_id')
		                       ->where('left_id','=',NULL)
							   ->orwhere('right_id','=',NULL)
	                           ->where('sponser_id',$matched_data->user_id)
                               ->get();
		//echo '<pre>';print_r($result);die;
        return view('mlmuser.userDetails',compact('user', 'matched_data', 'placement_id','result'));
    }                  
    
    public function userDetailsStore(Request $request)
     {
        
        $user_id = MlmUser::orderBy('id', 'desc')->first();
        $number = str_replace('MLM', '', isset($user_id) ? $user_id->member_id  : 0);
        if ($number == 0) {
            $number = 'MLM0000001';
        } else {
            $number = "MLM" . sprintf("%07d", (int)$number + 1);
        }

        $user = User::where('id', Auth::id())->first();

         $data = $request->validate([
            'user_id' => '', 'branch_id' => '','qrcode'=>'', 'member_id' => '', 'postcode' => 'required', 'nationality' => 'required', 'sponser_id' => '', 
              'birthday' => 'required', 'referal_code' => '', 'gender' => 'required','state'=>'required','country'=>'required', 'contact_address' => 'required', 'account_holder' => 'required','mobile_no' => 'required', 'email_id' => 'required',
           'bank_name' => 'required', 'payment_information' => 'required', 'branch' => 'required', 'account_no' => 'required', 'placement_id_type' => '',
             'mlm_status' => ''
         ]);
         

        $mlm_user = new MlmUser();

        $mlm_user->user_id = $user->user_id;
        $mlm_user->branch_id = $request->branch_id ?? null;
        $mlm_user->member_id = $number;
        $mlm_user->qrcode = $request->qrcode ?? null;
        $mlm_user->postcode = $request->postcode ?? null;
        $mlm_user->nationality = $request->postcode ?? null;
        $mlm_user->sponser_id = $request->sponser_id ?? null;
        $mlm_user->birthday = $request->birthday ?? null;
        $mlm_user->referal_code =  $request->referal_code;
        $mlm_user->gender = $request->gender ?? null;
        $mlm_user->mobile_no = $request->mobile_no ?? null;
        $mlm_user->email_id = $request->email_id ?? null;
        $mlm_user->state = $request->state ?? null;
        $mlm_user->country = $request->country ?? null;
        $mlm_user->contact_address = $request->contact_address ?? null;
        $mlm_user->account_holder = $request->account_holder ?? null;
        $mlm_user->bank_name = $request->bank_name ?? null;
        $mlm_user->payment_information = $request->payment_information ?? null;
        $mlm_user->branch = $request->branch ?? null;
        $mlm_user->account_no = $request->account_no ?? null;
        $mlm_user->placement_id_type = $request->placement_id_type ?? null;
        $mlm_user->mlm_status = '0';
        

        //echo '<pre>';print_r($mlm_user);die;

        $mlm_user->save();
        return redirect()->route('MemberShip-Selection');
    }

    public function placement()
    {
		$result=MlmUser::select('sponser_id')
		                       ->where('left_id','=',NULL)
							   ->orwhere('right_id','=',NULL)
                               ->get();
		//echo '<pre>';print_r($result);die;
        return view('mlmuser.placement',compact('result'));
       //print_r('called');exit;
    }
    public function get_placement_id()
    {
		//echo $_GET['id'];die;
		//DB::enableQueryLog();
        $user=MlmUser::where('sponser_id',$_GET['id'])
                     ->first();
		//$query = DB::getQueryLog();
      //echo '<pre>';print_r($query );die;
      //echo '<pre>'; print_r($user);die;	
       if ($user->left_id == null && $user->right_id == null) {
            echo json_encode(['view' => 2, 'data' => array('left' => 'Left', 'right' => 'Right')]);
        } else {
            if ($user->left_id == null) {
                $placement = 'Left';
                $value = 0;
            } else {
                $placement = 'Right';
                $value = 1;
            }
            echo json_encode(['view' => 1, 'data' => $placement, 'value' => $value]);
        }	  
    }
    public function get_placement()
    {
        $user = User::where('id', request()->id)->first();
        if ($user->left_id == null && $user->right_id == null) {
            echo json_encode(['view' => 2, 'data' => array('left' => 'Left', 'right' => 'Right')]);
        } else {
            if ($user->left_id == null) {
                $placement = 'Left';
                $value = 0;
            } else {
                $placement = 'Right';
                $value = 1;
            }
            echo json_encode(['view' => 1, 'data' => $placement, 'value' => $value]);
        }
    }
    public function placementDetailsStore(Request $request)
    {
       //echo '<pre>'; print_r($request->all());die;
       $user = User::where('id', Auth::id())->first();
       $referal_code = $user->referal_code;
       $mlm_user = MlmUser::where('referal_code', $referal_code)->first();
   

       $current_user_id = MlmUser::orderBy('id', 'desc')->first();
       //echo '<pre>'; print_r($current_user_id);die;
       $number = str_replace('MQU', '', isset($user_id) ? $user_id->sponser_id  : 0);
      // print_r($request->placement);exit();
      if($request->placement==0){
       $mlm_user->left_id = $current_user_id->user_id ;
       $mlm_user->placement = 0;

      }
      else{
      $mlm_user->right_id = $current_user_id->user_id ;
      $mlm_user->placement = 1;
      }
       $mlm_user->placement_id = $request->placement_id ?? null;
      //$mlm_user->placement = $request->placement ?? null;
      // $mlm_user->left_id =   $request->left_id ?? null;
      // $mlm_user->right_id =   $request->right_id ?? null;

       //echo '<pre>';print_r($mlm_user);die;

       $mlm_user->save();
       return view('frontend.index');
       //return redirect()->route('index');
   }

    public function membershipview()
    {
        $id = User::where('id', Auth::user()->id)->first();
        $user_id = $id->user_id;
        $products = Product::all();
        $rankings  = Ranking::all();
        $user_ranking = MlmUser::where('user_id', $user_id)->first();
        return view('mlmuser.membershipSelection', compact('products', 'rankings', 'user_ranking'));
    }
    public function storeranking(Request $request)
    {
        $id = User::where('id', Auth::user()->id)->first();
        $user_id = $id->user_id;
        MlmUser::where('user_id', $user_id)->update([
            'rank_id' => $request->ranking,
        ]);
    }
    public function productdetails($id)
    {
        $product_data = Product::where('id', $id)->first();
        return view('mlmuser.productDetails', compact('product_data'));
    }
    public function mailsend(Request $request)
    {
        $referal_code = Referal::where('user_id', Auth::user()->user_id)->first();
        $ref = $referal_code->referal_code;
        $email = $request->email;
        $details = [
            'title' => 'Registration link for myqueens',
            'body' =>  url('/register?referal_code=' . $ref),
        ];
        \Mail::to($email)->send(new SendMail($details));
        return redirect()->route('Mlm-Dashboard')->with('warning', 'Referal Link Shared Sucessfully!');
    }
}
