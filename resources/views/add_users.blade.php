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
                <h3 class="card-title">Uers</h3>
              </div>
              <!-- /.card-header -->
              <form method="POST" enctype='multipart/form-data' action="{{route('save_users')}}">

              <input type="hidden" name="_token" value="{{ csrf_token()}}">  
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Name">

                    <span style="color:red">{{ $errors->errormsg->first('name') }}</span>
                  </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">User Role </label>
                    <select class="form-control" name="user_role">
                      <option>-----user Role-----</option>
                      <?php foreach ($user_role as $value) {
                        ?>
                        <option value="{{$value->id}}">{{$value->name}}</option>
                        <?php
                      } ?>
                    </select>

                    <span style="color:red">{{ $errors->errormsg->first('user_role') }}</span>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email">

                    <span style="color:red">{{ $errors->errormsg->first('email') }}</span>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">

                    <span style="color:red">{{ $errors->errormsg->first('password') }}</span>
                  </div>
                  <!-- <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div> -->
                  <!-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div> -->
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