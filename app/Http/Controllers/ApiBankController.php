<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DepositStmt;
use App\Models\WithdrawStmt;
use App\Models\User;
use Validator;
use Carbon\Carbon;
use Session;
use DB;
use Auth;
use JWTAuth;
use JWTFactory;

use App\Models\UserRole;
class ApiBankController extends Controller
{

 public function api_add_user_deposit(Request $request)
    {
       $current_date_time = Carbon::now()->toDateTimeString();
        // dd($current_date_time);
        $validator = Validator::make($request->all(), [
          'user_id' => 'required',
          'amt'     => 'required',
             ]);
       if ($validator->fails()) {
       	$messages = $validator->getMessageBag();
          return response()->json([
                 'errormsg' => $messages
                   ]);
        } 
        
       $data = array(
       'user_id'       =>  $request->user_id,
       'amt'           =>  $request->amt,
       'date_time'     =>  $current_date_time,
       'status'        =>  'pending',
       );
       $id=DepositStmt::insertGetId($data);
        if($id)
             {
                $data_= array(
                'user_id'       =>  $request->user_id,
                'amt'           =>  $request->amt,
                'id'            =>  $id,
                );
                return view('api_payment_page',$data_);
             }
        else 
             { 
                return response()->json([
                 'message' =>'something went wrong!!!'
                   ]);
             }
    }
public function api_add_user_withdraw(Request $request)
{
	$current_date_time = Carbon::now()->toDateTimeString();
    $validator = Validator::make($request->all(), [
      'user_id' => 'required',
      'amt'     => 'required',
         ]);
       if ($validator->fails()) {
          $messages = $validator->getMessageBag();
          return response()->json([
                 'errormsg' => $messages
                   ]);
        } 
        //////////////
        $users_deposit_data =  DepositStmt::where('status','success')->where('user_id',$request->user_id)->get();
        $users_withdraw_data = WithdrawStmt::where('status',1)->where('user_id',$request->user_id)->get();
        $amt=0;$withdraw_amt=0;
        foreach ($users_deposit_data as  $value) {
             $amt=$amt+$value->amt;
         }
         foreach ($users_withdraw_data as  $value) {
             $withdraw_amt=$withdraw_amt+$value->amt;
         } 
         $user_total_amt= $amt-$withdraw_amt;
        if($user_total_amt<$request->amt){
        	return response()->json([
                 'message' =>'user total amt in wallet is less !!!'
                   ]);
        }
        /////////////
       $data = array(
       'user_id'       =>  $request->user_id,
       'amt'           =>  $request->amt,
       'date_time'     =>  $current_date_time,
       'status'        =>  0,
       );
       $id=WithdrawStmt::insertGetId($data);
       if($id)
             {
               return response()->json([
                 'message' =>'Record inserted successfull..!!'
                   ]);
             }
        else 
             {
                return response()->json([
                 'message' =>'something went wrong!!!'
                   ]);
             }
}
//////signup api////
public function register_user(Request $request)
	{
		$validator = \Validator::make(
                $request->all(),
                [
                    'name'  => 'required',
                    'email' => 'required|unique:users',
                    'password' => 'required',
                    'role_id'  => 'required',
                ]
            );
		if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return response()->json([
                 'message' => $messages
                   ]);
            }
        ///add more validation
        $role_id = UserRole::where('id',$request->role_id)->first();

        if (!$role_id) {
             return response()->json([
            'message' => 'Invalid role id'
        ]);
        }
       
       $data = array(
       'name'       =>  $request->name,
       'email'      =>  $request->email,
       'password'   => bcrypt($request->password),
       'user_role'    =>  $request->role_id,
       );

       $id=User::insertGetId($data);
       if($id)
             {
               return response()->json([
                 'message' =>'Registration Successful. Please verify and log in to your account.'
                   ]);
             }
        else 
             {
                return response()->json([
                 'message' =>'something went wrong!!!'
                   ]);
             }
	}
////end///////
///user login api
public function login_user(Request $request)
{
	 $validator = \Validator::make(
            $request->all(),
            [
                'email' => 'required|regex:/^.+@.+$/i',
                'password' => 'required',
            ]
            );
    if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return response()->json([
                 'message' => $messages
                   ]);
    }                 
    $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user=User::where('email',$request->email)->first();
            $user_arr=$user->toArray();
            $token = JWTAuth::fromUser($user);
            $data=array(
                'api_token'=>$token
               );
            $updated=User::where('email',$request->email)->update($data);
            $user=User::where('email',$request->email)->first();
            $user_arr=$user->toArray();
            if($updated){
                $res=[
                 'responseCode'=>1,
                 'userData' => $user_arr,
                 'message' => 'Verified',
                ];
                return response()->json($res);
              
            } 
            else{
              $res=[
                 'responseCode'=>0,
                 'message' => 'Some thing want wrong',
                ];
                return response()->json($res);  
            }          
        } 
        else{
            ///invaild email and password
            $res=[
                 'responseCode'=>0,
                 'message' => 'invaild email and password',
                ];
                return response()->json($res);
            

        }        
} 
////end
////user send money to other user api
public function send_money_to_user(Request $request)
{
	$current_date_time = Carbon::now()->toDateTimeString();
    $validator = Validator::make($request->all(), [
      'sender_user_id'   => 'required',
      'receiver_user_id' => 'required',
      'amt'              => 'required',
         ]);
       if ($validator->fails()) {
          $messages = $validator->getMessageBag();
          return response()->json([
                 'errormsg' => $messages
           ]);
        }
         $users_deposit_data =  DepositStmt::where('status','success')->where('user_id',$request->sender_user_id)->get();
        $users_withdraw_data = WithdrawStmt::where('status',1)->where('user_id',$request->sender_user_id)->get();
        $amt=0;$withdraw_amt=0;
        foreach ($users_deposit_data as  $value) {
             $amt=$amt+$value->amt;
         }
         foreach ($users_withdraw_data as  $value) {
             $withdraw_amt=$withdraw_amt+$value->amt;
         } 
         $user_total_amt= $amt-$withdraw_amt;
        if($user_total_amt<$request->amt){
        	return response()->json([
                 'message' =>'user total amt in wallet is less !!!'
            ]);
        }
        $data = array(
       'user_id'       =>  $request->receiver_user_id,
       'amt'           =>  $request->amt,
       'date_time'     =>  $current_date_time,
       'status'        =>  'success',
       'sender_id'   =>  $request->sender_user_id,
       );
       $id=DepositStmt::insertGetId($data);
        if($id)
             {
				$data_ = array(
				'user_id'       =>  $request->sender_user_id,
				'amt'           =>  $request->amt,
				'date_time'     =>  $current_date_time,
				'status'        =>  1,
				'receiver_id' =>  $request->receiver_user_id,
				);
				$id=WithdrawStmt::insertGetId($data_);
				if($id){
               return response()->json([
                 'message' =>'money transfer Successful!!!'
                   ]);
             }
          else 
             {
                return response()->json([
                 'message' =>'something went wrong!!!'
                   ]);
             }
             }
        else{
        		 return response()->json([
                 'message' =>'something went wrong!!!'
                   ]);
             }
}
///end	
}
