<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserRole;
use Validator;
use Illuminate\Support\Facades\Hash;
use Session;
class UserRoleController extends Controller
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
        $data['user_role'] = UserRole::get();
        return view('users_role',$data);
    }
    public function add_user_role()
    {
        return view('add_user_role');
    }
    public function save_user_role(Request $request)
    {
    if(empty($request->role_id))
    { 
       $validator = Validator::make($request->all(), [
          'name'         => 'required',
             ]);

     }else{
      
          $validator = Validator::make($request->all(), [
          'role_id'      => 'required|numeric',
          'name'         => 'required',
             ]);
          
     }
     if ($validator->fails()) {
         return redirect()->back()->withInput()->withErrors($validator, 'errormsg');
        } 
      ///////////////////////////
     $data = array(
       'name'          =>  $request->name,
       );

    if(empty($request->role_id))
       {
          if(UserRole::insert($data))
             {
                Session::flash('message','Record inserted successfull..!!!'); 
                return redirect('user_role');
             }
             else 
             {
                Session::flash('message','Record inserted successfull..!!!'); 
                return redirect('user_role');
             }
       }
       else
       {
           UserRole::where('id',$request->role_id)->update($data);
           Session::flash('message', 'Record updated successfull..!!!');
            return redirect('user_role')->with('success', 'Record has been successfully updated !');
       }
              
    }

    public function delete_user_role(Request $request)
    {
        $query = UserRole::where('id',$request->user_id)->delete();
        return redirect('user_role')->with('message','Record has been successfully to deleted.. !');
    }
    public function edit_user_role($id)
    {
         $data['record'] = UserRole::where('id',$id)->first();
         return view('edit_user_role',$data);
    }
}
