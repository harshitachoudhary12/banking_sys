@extends('admin_layouts.app')
@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Role</h1>
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
                <h3 class="card-title">User Role</h3>
              </div>
              <!-- /.card-header -->
              <form method="POST" enctype='multipart/form-data' action="{{route('save_user_role')}}">

              <input type="hidden" name="_token" value="{{ csrf_token()}}">  
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Name">

                    <span style="color:red">{{ $errors->errormsg->first('name') }}</span>
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