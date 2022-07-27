<?php
namespace App\Helper;
use Session;
use DB;
use App\Models\User;
use App\Models\Order;
use App\Models\MlmUser;
use App\Models\MatchingBonus;
class AppHelper {

public static function getparentdetails($userId,$memberId){
	
		$data=MlmUser::select('mlm_users.left_id','mlm_users.right_id','mlm_users.user_id','mlm_users.id','left.id as leftId','right.id as rightId')
					->join('mlm_users as left','left.user_id','=','mlm_users.left_id','left')
					->join('mlm_users as right','right.user_id','=','mlm_users.right_id','left')
		            ->where('mlm_users.user_id','=',$userId)			   
			        ->first();	
                    //echo '<pre>'; print_r($data);die;					
			if(isset($data->left_id) && isset($data->right_id)){
				if($memberId == $data->left_id){
					//echo "left";
					$data=Order::select('orders.order_unique','orders.total_pv')
					->where('orders.user_unique','=',$data->right_id)
					//->whereNull('in_house_status')
					->where('orders.self_pick_order_status','=','5')
					->where('orders.status_for_matching_bonus','=','0')
					->where('orders.status_for_old_order','=','1');
										
					if($data->count() > 0){
						$data=$data->first();
						$type= 1;
					    $totalPv = $data->total_pv;
						$data = $data->order_unique;
					}else{
						$type= 0;
						$totalPv = 0;
					}			  
				}
				else if($memberId == $data->right_id){
					//echo "right";
					$data=Order::select('orders.order_unique','orders.total_pv')
					->where('orders.user_unique','=',$data->left_id)
					//->whereNull('in_house_status')
					->where('orders.self_pick_order_status','=','5')
					->where('orders.status_for_matching_bonus','=','0')
					->where('orders.status_for_old_order','=','1');
						

					if($data->count() > 0){
						$data=$data->first();
						$type= 2;
						$totalPv = $data->total_pv;
					}else{
						$type= 0;
						$totalPv = 0;
					}	
				}
			}else{
				$type = 3;
				$totalPv = 0;
			}			 
			return array($type,$totalPv);
	    
	}
	
	public static function getchildparentdetails($userID,$type,$point,$pvPointTotal){
		 if($userID < 'MQU0000002')
		 {
			return 1;
		 }else{
		
		$totalPv = 0;
		$parentDetails=MlmUser::select('mlm_users.placement_id','mlm_users.sponser_id','mlm_users.member_id','mlm_users.user_id','mlm_users.rank_id')
					  ->where('mlm_users.user_id','=',$userID)
					  ->first();
		$data=MlmUser::select('mlm_users.left_id','mlm_users.right_id','mlm_users.user_id','left.id as leftId','right.id as rightId')
					->join('mlm_users as left','left.user_id','=','mlm_users.left_id','left')
					->join('mlm_users as right','right.user_id','=','mlm_users.right_id','left')
		            ->where('mlm_users.user_id','=',$parentDetails->placement_id)			   
			        ->first();
					//echo '<pre>'; print_r($data);die;
			  if(isset($data->left_id) && isset($data->right_id))
			  {
                if($type == $data->left_id)
				{
				  $data=Order::select('orders.order_unique','orders.total_pv')
				  ->where('orders.user_unique','=',$data->right_id)
				  ->where('orders.self_pick_order_status','=','5')
					->where('orders.status_for_matching_bonus','=','0')
					->where('orders.status_for_old_order','=','1')
				  ->first();
				  $type= 1;
				  $totalPv = $data->total_pv;
				}
				else if($type == $data->right_id)
				{
				  $data=Order::select('orders.order_unique','orders.total_pv')
				  ->where('orders.user_unique','=',$data->left_id)
				  ->where('orders.self_pick_order_status','=','5')
					->where('orders.status_for_matching_bonus','=','0')
					->where('orders.status_for_old_order','=','1')
				  ->first();
				  $type = 2;
				  $totalPv = $data->total_pv;
				}
			 }
                else
				{
				  $type = 3;
				  $totalPv = 0;
			    }
                if($totalPv == 0)
				{
				   $pvPoints=$pvPointTotal;
				}
                else
				{
					$pvPoints=$totalPv+$pvPointTotal;
				}	
				//echo '<pre>';print_r($data->order_unique);die;
				 if($parentDetails->rank_id == 1){
				 $bonusper=6;
				 $bonus= ($totalPv*$bonusper)/100;  
			 }			  
			 if($parentDetails->rank_id == 2){
				 $bonusper1= 8;
				 $bonus= ($totalPv*$bonusper1)/100;  
			 }
			 if($parentDetails->rank_id == 3){
				 $bonusper2= 10;
				 $bonus= ($totalPv*$bonusper2)/100;  
			 }
			 if($parentDetails->rank_id == 4){
				 $bonusper3= 12;
				 $bonus= ($totalPv*$bonusper3)/100;  
			 }
			  // echo $data->order_unique;die;
                 $bonusParent=array(
				 'sponser_id'=> $parentDetails->sponser_id,
				 'member_id'=> $parentDetails->member_id,
				 'user_id'=> $parentDetails->placement_id,
				 'point'=> $bonus,
				 'status'=>1,
				 'created_at'=>DB::raw('CURRENT_TIMESTAMP'),
				 'updated_at'=>DB::raw('CURRENT_TIMESTAMP')		 
				 );                 
                 $storeMatchingBonus=MatchingBonus::insert($bonusParent);
				 $updateMatchingPoints = MlmUser::where('user_id', $parentDetails->sponser_id)
            ->update(['total_matching_bonus' => $bonus]);
				 //$updateBonusStatus=Order::where('order_unique', $data->order_unique)->update(['status_for_matching_bonus' => 1]);
				 $callAgain=self::getchildparentdetails($parentDetails->placement_id,$type,$point,$pvPoints);
              }
}
}
?>