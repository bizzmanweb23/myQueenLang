<?php

namespace App\Http\Controllers\MLM;

use App\Http\Controllers\Controller;
use App\Models\MlmUser;
use App\Models\Ranking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MLMTreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		
        return view('mlm.tree.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //echo $data=Auth::user()->user_id;die;
        $data =  MlmUser::where('sponser_id', Auth::user()->user_id)
            ->orWhere('placement_id', Auth::user()->user_id)->where('mlm_status', 1)->get();
        //echo '<pre>'; print_r($data);die;
        $display = array();
        if ($data->count() > 0) {
            foreach ($data as $item) {
                $user = User::where('user_id', $item->user_id)->first();
                //echo '<pre>'; print_r($user);die;
                $ranking = Ranking::where('id', $item->rank_id)->first();
				//echo '<pre>'; print_r($ranking);die;

                if (array_search($item->member_id, array_column($display, 'member_id')) !== False) {
                } else {

                    $pid = User::where('user_id', $item->placement_id)->first();
					//echo '<pre>'; print_r($pid);die;
                    $display[] = [
                        'id'        => $user->id,
                        'pid'       => $pid->id,
                        'name'      => $item->member_name,
                        'member_id' => $item->member_id,
                        'img'       => $user->image == null ?  asset('asset/image/icon/user.png') : asset($user->image),
                        'name'      => $user->name,
                        'title'     => $ranking->type,
                        // 'title'     => $item->member_id,
                        'tag'       => $item->placement,
                        'direct_id' => $item->sponser_id
                    ];
                }
                //echo '<pre>';print_r($display);die;

                $more =  MlmUser::where('sponser_id', $item->user_id)
                    ->orWhere('placement_id', $user->user_id)->get();
                //echo '<pre>'; print_r($more);die;
                if ($more) {
                    foreach ($more as $value) {
                        //echo '<pre>';print_r($value);die;
                        //$user = User::where('user_id', $value->user_id)->first();
                        $more_user = MlmUser::where('user_id', $value->user_id)->first();
                        //echo '<pre>';print_r($more_user);die;
                        $more_ranking = Ranking::where('id', $value->rank_id)->first();
                        if (array_search($value->member_id, array_column($display, 'member_id')) !== False) {
                        } else {
                            $pid = User::where('user_id', $value->placement_id)->first();
                            $display[] = [
                                'id'        => $more_user->id,
                                'pid'       => $pid->id,
                                'name'      => $value->member_name,
                                'member_id' => $value->member_id,
                                'img'       => $more_user->image == null ?  asset('asset/image/icon/user.png') : asset($more_user->image),
                                'title'     => $more_ranking->type,
                                // 'title'     => $value->member_id,
                                'tag'       => $value->placement,
                                'direct_id' => $value->sponser_id
                            ];
                        }
                        //echo '<pre>'; print_r($display);die;

                        $many_more =  MlmUser::where('sponser_id', $value->user_id)
                            ->orWhere('placement_id', $more_user->user_id)->get();
                        //echo '<pre>'; print_r($many_more);die;	
                        foreach ($many_more as $more_value) {
                            $many_more_user = MlmUser::where('user_id', $more_value->user_id)->first();
                            $many_more_ranking = Ranking::where('id', $more_value->rank_id)->first();
                            if (array_search($more_value->member_id, array_column($display, 'member_id')) !== False) {
                            } else {
                                $pid = User::where('user_id', $value->more_value)->first();
                                $display[] = [
                                    'id'        => $many_more_user->id,
                                    'pid'       => $pid->id,
                                    'name'      => $more_value->member_name,
                                    'member_id' => $more_value->member_id,
                                    'img'       => $many_more_user->image == null ?  asset('asset/image/icon/user.png') : asset($many_more_user->image),
                                    'title'     => $many_more_ranking->type,
                                    // 'title'     => $more_value->member_id,
                                    'tag'       => $more_value->placement,
                                    'direct_id' => $more_value->sponser_id
                                ];
                            }
                        }
                    }
                }
            }
        } else {
            //echo $u1=Auth::user()->left_id;
            //echo Auth::user()->id;die;
            $left_user = MlmUser::where('left_id', Auth::user()->left_id)->first();
            $right_user = MlmUser::where('right_id', Auth::user()->right_id)->first();
            if ($left_user) {
                $mlm =  MlmUser::where('member_id', Auth::user()->left_id)->first();
                $ranking = Ranking::where('id', $left_user->rank_id)->first();
                $display[] = [
                    'id'    => $left_user->id,
                    'pid'   => Auth::user()->id,
                    'name'  => $left_user->name,
                    'img'       => Auth::user()->image == null ?  asset('asset/image/icon/user.png') : asset(Auth::user()->image),
                    'title'     => $ranking->type,
                    // 'title'     => Auth::user()->unique_id,
                    'tag'       => $mlm->placement,
                    'direct_id' => Auth::user()->unique_id
                ];
            }

            if ($right_user) {
                $mlm =  MlmUser::where('member_id', Auth::user()->right_id)->first();
                $ranking = Ranking::where('id', $right_user->rank_id)->first();
                $display[] = [
                    'id' => $right_user->id,
                    'pid' => Auth::user()->id,
                    'name' => $right_user->name,
                    'img'       => Auth::user()->image == null ?  asset('public/icon/user.png') : asset(Auth::user()->image),
                    'title'     => $ranking->type,
                    // 'title'     => Auth::user()->unique_id,
                    'tag'       => $mlm->placement,
                    'direct_id' => Auth::user()->unique_id
                ];
            }
        }

        $main_user_mlm =  MlmUser::where('member_id', Auth::user()->unique_id)->first();
        if ($main_user_mlm)
            $main_user_ranking = Ranking::where('id', Auth::user()->rank_id)->first();
        else
            $main_user_ranking = false;
        $display[] = [
            'id' => Auth::user()->id,
            'name' => Auth::user()->name,
            'img'       => Auth::user()->image == null ?  asset('asset/image/icon/user.png') : asset(Auth::user()->image),
            'title'     => $main_user_ranking ?  $main_user_ranking->type : 'Diamond',
            'tag'       => 0,
            'direct_id' => $main_user_mlm ? $main_user_mlm->sponser_id : Auth::user()->unique_id
        ];
        usort($display, function ($a, $b) {
            return $a['tag'] <=> $b['tag'];
        });

        echo json_encode($display);
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