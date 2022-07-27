<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MlmUser;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['result'] = MlmUser::join('users','users.user_id','=','mlm_users.user_id')
                                    ->select('*')
                                    ->get();
		//echo '<pre>'; print_r($users);die;
        return view('admin.user',$data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 public function edit_users()
	 {
		//echo $_GET['id']; 
		$data['result']=MlmUser::join('users','users.user_id','=','mlm_users.user_id')
                                    ->select('*')
									->where('mlm_users.user_id',$_GET['id'])
                                    ->get();
									//echo '<pre>'; print_r($data);die;
									return view('admin.editUsers',$data);
	 }
	 
	 public function save_users_details(Request $request)
	 {
	  $id=$request->id;
	  $user_edit_data = $request->validate([
			'mobile_no'     => ['required','string', 'max:255'],
            'rank_id'  => ['required','string', 'max:255'] ,           
            'total_pv_point'  => ['required','string', 'max:255'],            
            'total_matching_bonus'  => ['required','string', 'max:255'],           
            'total_direct_dponsor'  => ['required','string', 'max:255'],            
            'leadership_bonus'  => ['required','string', 'max:255'],            
            'wallet'  => ['required','string', 'max:255'],            
        ], [
		    'mobile_no.required'       => 'Please Enter Contact Number',
            'rank_id.required'    => 'Please Enter Rank ID',
            'total_pv_point.required'    => 'Please Enter Total PV Points',
            'total_matching_bonus.required'    => 'Please Enter Matching Bonus',
            'total_direct_dponsor.required'    => 'Please Enter Direct Bonus',
            'leadership_bonus.required'    => 'Please Enter Leadership Bonus',
            'wallet.required'    => 'Please Enter wallet',
        ]);
		
		//echo '<pre>';print_r($brokerArr);die;
		
		$data=MlmUser::where('user_id',$id)->update($user_edit_data);
		echo json_encode(['status' => 'success', 'message' => 'User Details Edit Succesfully']);
	 }
	 
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
        //
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
