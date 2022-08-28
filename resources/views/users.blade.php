@extends('admin_layouts.app')
@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol> -->
          <?php $role=Auth::user()->user_role;
          if($role==1){ ?>
            <a href="{{route('add_users')}}" class="btn btn-success btn-anim float-sm-right" style="margin-left: 950px;"><i class="icon-rocket"></i><span class="btn-text">Add</span></a>
           <?php } ?>
          </div>
        </div>
      </div><!-- /.container-fluid -->

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          @if(Session::has('message'))
           <p class="alert alert-info">{{ Session::get('message') }}</p>
          @endif
          <div class="col-12">
            

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Uers</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Wallet Balance</th>
                    <?php if($role!=3){
                      ?><th>Action</th><?php
                    } ?>
                    
                  </tr>
                  </thead>
                  <tbody>
                   <?php
                   foreach($users as $data){
                  ?> 
                  <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td>
                      <?php
                      foreach ($user_role as $value) {
                         if($data->user_role==$value->id){
                          echo $value->name;
                         }
                       } ?>
                    </td>
                    <td><?php
                    $amt=0;$withdraw_amt=0;
                    foreach ($users_deposit as  $value) {
                       if ($value->user_id==$data->id) {
                         $amt=$amt+$value->amt;
                       }
                     }
                     foreach ($users_withdraw as  $value) {
                       if ($value->user_id==$data->id) {
                         $withdraw_amt=$withdraw_amt+$value->amt;
                       }
                     } 
                     echo $amt-$withdraw_amt;?></td>
                     <?php if($role!=3){
                      ?> <td>
                      <a href="{{url('edit_users/'.$data->id)}}">Edit</a>   / 
                      <a href="#" data-toggle="modal" data-target="#exampleModal" class="user" id="{{$data->id}}">Delete</a>  /
                      <a href="{{url('user_stmt/'.$data->id)}}">Stmt</a>  </td> <?php
                    } ?>
                     
                  </tr>
                <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Wallet Balance</th>
                    <?php if($role!=3){
                      ?><th>Action</th><?php
                    } ?>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <!-- <h5 class="modal-title" id="exampleModalLabel1">New Laravel Project says.</h5> -->
                  </div>
              <div class="modal-body">
                          <p>Are you sure you want to delete this item?</p>
                  </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <form method="POST" action="{{route('delete_users')}}">
                <input type="hidden" name="_token" value="{{ csrf_token()}}">
               
                  <input type="hidden" name="user_id" class="form-control" id="user_id">
              
                    <button type="submit" class="btn btn-primary btn-flat">Yes</button>
              </form>
            </div>
           
                        </div>
                      </div>
                    </div>
@endsection    