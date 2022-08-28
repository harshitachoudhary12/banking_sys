@extends('admin_layouts.app')
@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Withdraw</h1>
          </div>
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol> -->
          </div>
        </div>
      </div><!-- /.container-fluid -->

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">User Withdraw</h3>
              </div>
              <!-- /.card-header -->
              <form method="POST" enctype='multipart/form-data' action="{{route('save_users_withdraw')}}">

              <input type="hidden" name="_token" value="{{ csrf_token()}}">  
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">User</label>
                   
                    <select class="form-control" name="user_id">
                      <option>----select User-----</option>
                      <?php 
                       foreach ($users as $value) {
                        ?>
                        <option value="{{$value->id}}">{{$value->name}}</option>
                        <?php
                       }
                       ?>
                    </select>

                    <span style="color:red">{{ $errors->errormsg->first('user_id') }}</span>
                  </div>
                 
                 <div class="form-group">
                    <label for="exampleInputEmail1">Amount </label>
                    <input type="number" class="form-control" id="exampleInputEmail1" name="amt" placeholder="Enter Amount">

                    <span style="color:red">{{ $errors->errormsg->first('amt') }}</span>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
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
@endsection    