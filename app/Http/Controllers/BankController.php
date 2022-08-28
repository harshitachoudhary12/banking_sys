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
class BankController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $user_role=Auth::user()->user_role;
        if($user_role==4){
          $data['users_deposit'] = DepositStmt::where(['user_id'=>Auth::user()->id])->get();
        }else{
          $data['users_deposit'] = DepositStmt::get();
        }
        $data['users'] = User::get();
        return view('users_deposit',$data);
    }

    public function add_user_deposit()
    {
        $data['users'] = User::get();
        return view('add_users_deposit',$data);
    }

    public function save_user_deposit(Request $request)
    {
        $current_date_time = Carbon::now()->toDateTimeString();
        // dd($current_date_time);
        $validator = Validator::make($request->all(), [
          'user_id' => 'required',
          'amt'     => 'required',
             ]);
       if ($validator->fails()) {
         return redirect()->back()->withInput()->withErrors($validator, 'errormsg');
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
                return view('payment_page',$data_);
             }
        else 
             {
                Session::flash('message','something went wrong!!!'); 
                return redirect('add_user_deposit');
             }

    }
    public function users_withdraw()
    {
        $user_role=Auth::user()->user_role;
        if($user_role==4){
          $data['users_deposit'] = WithdrawStmt::where(['user_id'=>Auth::user()->id])->get();
        }else{
          $data['users_deposit'] = WithdrawStmt::get();
        }
        $data['users_deposit'] = WithdrawStmt::get();
        $data['users'] = User::get();
        return view('user_withdraw',$data);
    }
    public function add_users_withdraw()
    {
        $data['users'] = User::get();
        return view('add_users_withdraw',$data);
    }
    public function save_users_withdraw(Request $request)
    {
        $current_date_time = Carbon::now()->toDateTimeString();
        // dd($current_date_time);
        $validator = Validator::make($request->all(), [
          'user_id' => 'required',
          'amt'     => 'required',
             ]);
       if ($validator->fails()) {
         return redirect()->back()->withInput()->withErrors($validator, 'errormsg');
        } 
       $data = array(
       'user_id'       =>  $request->user_id,
       'amt'           =>  $request->amt,
       'date_time'     =>  $current_date_time,
       'status'        =>  0,
       );
       $id=WithdrawStmt::insertGetId($data);
       if($id)
             {
                Session::flash('message','Record inserted successfull..!!!'); 
                return redirect('users_withdraw');
             }
        else 
             {
                Session::flash('message','something went wrong!!!'); 
                return redirect('users_withdraw');
             }

    }
    public function admin_approved($id)
    {
        $data = array(
           'status'        =>  1
         );
        WithdrawStmt::where('id',$id)->update($data);
        Session::flash('message', 'Record updated successfull..!!!');
        return redirect('users_withdraw')->with('success', 'Record has been successfully updated !');
    }
    public function user_stmt($id)
    {
        $data['users_withdraw'] = WithdrawStmt::where('user_id',$id)->orderBy('date_time', 'desc')->get();
        $data['users_deposit'] = DepositStmt::where('user_id',$id)->orderBy('date_time', 'desc')->get();
        
        $final_arr=array();
        foreach ($data['users_deposit'] as  $deposit) {
         $date_time_deposit=$deposit->date_time;
         $arr=array();
         $arr['type']='deposit';
         $arr['amt']=$deposit->amt;
         $arr['status']=$deposit->status;
         $arr['date_time']=$deposit->date_time;
         $arr['int_date_time']=strtotime($deposit->date_time);
          array_push($final_arr, $arr);
       }
           foreach ($data['users_withdraw'] as $withdraw) {
            $date_time_withdraw=$withdraw->date_time;
            $arr=array();
            $arr['type']='withdraw';
            $arr['amt']=$withdraw->amt;
            $arr['status']=$withdraw->status;
            $arr['date_time']=$withdraw->date_time;
            $arr['int_date_time']=strtotime($withdraw->date_time);
            array_push($final_arr, $arr);

       }
       // echo "<pre>";
       // print_r($final_arr);
       //////////////
       // $stmt = collect($final_arr)->sortBy('int_date_time')->reverse()->toArray();
       $stmt = collect($final_arr)->sortBy('int_date_time')->toArray();
        // print_r($stmt);die; 
       ///////////////
       $data['final_arr']=$stmt;
       return view('user_stmt',$data);
    }

}
