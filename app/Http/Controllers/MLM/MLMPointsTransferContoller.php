<?php

namespace App\Http\Controllers\MLM;
use DB;
use Helper;
use App\Http\Controllers\Controller;
use App\Models\MatchingBonus;
use App\Models\MLMWithDraw;
use App\Models\MLMLoyalityPoint;
use App\Models\RedeemLoyalityPoint;
use App\Models\User;
use App\Models\Order;
use App\Models\MlmUser;
use App\Models\MLMTransferFunds;
use App\Models\Ranking;
use App\Models\UseOfPv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MLMPointsTransferContoller extends Controller
{
      public function index()
    {
		$data['result']= MlmUser::select('*')->where('user_id',Auth::user()->user_id)->get();
		//echo '<pre>';print_r($data);die;
        return view('mlm.transfer.index',$data);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	 
	 public function store(Request $request)
	 {
        $transfer_data = $request->validate([
			'tansferID'              => 'required',
			'amount'              => 'required',
        ], [
		    'tansferID.required'     => 'Please Enter User ID',
		    'amount.required'     => 'Please Enter Amount',
        ]);
	    $creditWallet=MlmUser::select('*')->where('user_id', Auth::user()->user_id)->get();
						//echo '<pre>';print_r($creditWallet);die;
				if($_POST['amount'] <= $creditWallet[0]->total_pv_point)
			{
                $creditWallet_data['status'] = 1;
				$creditWallet_data['transfer_by'] = Auth::user()->user_id;
				$creditWallet_data['transfer_to'] = $_POST['tansferID'];
				$creditWallet_data['amount'] = $_POST['amount'];
				$creditWallet_data['transfer_date'] = date('Y-m-d');
				$id=$_POST['tansferID'];
				//echo '<pre>';print_r($id);die;
				$data=MLMTransferFunds::insert($creditWallet_data);
				$user=MlmUser::select('*')->where('member_id',$id)->get();
				//echo '<pre>'; print_r($user);die;
				$result=MlmUser::where('user_id',Auth::user()->user_id)
				              ->update([
							  'total_pv_point'  => DB::raw($creditWallet[0]->total_pv_point - $_POST['amount'])
							  ]);
					//echo '<pre>';print_r($walletUpdate);die;
				$walletUpdate=MlmUser::where('member_id','=',$id)
				              ->update([
							  'total_pv_point'  => DB::raw($user[0]->total_pv_point + $_POST['amount'])
							  ]);
				 //echo '<pre>';print_r($walletUpdate);die;
			    echo json_encode(['status' => 'success', 'message' => 'Funds Transfer Successfully']);
			}
			else
			{
				//die('else');
			 echo json_encode(['status' => 'danger', 'message' => 'You Does Not Have Sufficient PV Point']);
			}	
			//return redirect('/MLM/transfer_points');
	 }
	 
	 public function transfer_funds_history()
	 {
		 $result= MlmUser::select('*')->where('user_id',Auth::user()->user_id)->get();
		 $data = MLMTransferFunds::join('users', 'users.user_id', '=', 'transfer_funds.transfer_by')
            ->select('users.name', 'transfer_funds.*')
            ->where('transfer_funds.transfer_to', $result[0]->member_id)
			->get();
			//echo '<pre>'; print_r($data);die;
             echo json_encode($data);
	 }
}