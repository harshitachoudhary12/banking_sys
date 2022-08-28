<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserRole;
use Validator;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Models\DepositStmt;
use App\Models\WithdrawStmt;
use Auth;
class UserController extends Controller
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
    {   $user_role=Auth::user()->user_role;
        if($user_role==4){
          $data['users'] = User::where(['id'=>Auth::user()->id])->get();
        }else{
          $data['users'] = User::get();
        }
        
        $data['user_role'] = UserRole::get();
        $data['users_deposit'] =  DepositStmt::where('status','success')->get();
        $data['users_withdraw'] = WithdrawStmt::where('status',1)->get();

        return view('users',$data);
    }
    public function add_users()
    {
        $data['user_role'] = UserRole::get();
        return view('add_users',$data);
    }
    public function save_users(Request $request)
    {
    if(empty($request->user_id))
       { 
       $validator = Validator::make($request->all(), [
          'name'         => 'required',
          'email'        => 'required|unique:users|regex:/^.+@.+$/i',
          'password'     => 'required',
          'user_role'    => 'required|numeric',
             ]);

     }else{
      
          $validator = Validator::make($request->all(), [
          'user_id'      => 'required|numeric',
          'name'         => 'required',
          'email'        => 'required|regex:/^.+@.+$/i',
          'user_role'    => 'required|numeric',
             ]);
          //////////////////////////////
          $user_email_check = User::where(['email'=>$request->email])->first();
          if (($user_email_check)) {
          if ($user_email_check->id!=$request->user_id){
             return redirect()->back()->withInput()->withErrors('Email Id already in use', 'errormsg');
             }
          }
          ///////////////////////////////
     }
     if ($validator->fails()) {
         return redirect()->back()->withInput()->withErrors($validator, 'errormsg');
        } 
      ///////////////////////////
    $data = array(
       'name'          =>  $request->name,
       'email'         =>  $request->email,
       'password'      =>  Hash::make($request->password),
       'user_role'     =>  $request->user_role,
       );

    if(empty($request->user_id))
       {
          if(User::insert($data))
             {
                Session::flash('message','Record inserted successfull..!!!'); 
                return redirect('users');
             }
             else 
             {
                Session::flash('message','Record inserted successfull..!!!'); 
                return redirect('users');
             }
       }
       else
       {
           User::where('id',$request->user_id)->update($data);
           Session::flash('message', 'Record updated successfull..!!!');
            return redirect('users')->with('success', 'Record has been successfully updated !');
       }
              
    }

    public function delete_users(Request $request)
    {
        $query = User::where('id',$request->user_id)->delete();
        return redirect('users')->with('message','Record has been successfully to deleted.. !');
    }
    public function edit_users($id)
    {
         $data['user_role'] = UserRole::get();
         $data['record'] = User::where('id',$id)->first();
         return view('edit_users',$data);
    }
}
