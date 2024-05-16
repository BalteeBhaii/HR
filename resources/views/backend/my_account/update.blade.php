@extends('backend.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">My Account</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Update</a></li>
                        <li class="breadcrumb-item active">Account </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('message')
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Update My Account </h3>
                        </div>
                        <form action="{{ url('admin/my_account/update') }}" class="form-horizontal" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Name<span
                                            style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" required
                                            placeholder="Enter  Name" value="{{ $getRecord->name }}">
                                        <span style="color:red">{{ $errors->first('name') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label"> Email<span
                                            style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="email" required
                                            placeholder="Enter  Email" value="{{ $getRecord->email }}">
                                        <span style="color:red">{{ $errors->first('email') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Profile Image<span
                                            style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="profile_image" >
                                        <span style="color:red">{{ $errors->first('profile_image') }}</span>
                                        @if(!empty($getRecord->profile_image))
                                        @if(file_exists('upload/'.$getRecord->profile_image))
                                         <img src="{{ url('upload/'.$getRecord->profile_image) }}" width="80" height="80" class="rounded-circle"/>
                                         @endif
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Password<span
                                            style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="password"
                                            placeholder="Enter  Password">
                                            <p class="text-danger">Leave blank if you dont want to change the password.</p>
                                        <span style="color:red">{{ $errors->first('password') }}</span>
                                    </div>
                                </div>


                            </div>

                            <div class="card-footer">
                                <a href="{{ url('admin/my_account') }}" class="btn btn-default">Back</a>

                                <button type="submit" class="btn btn-primary float-right">Update</button>
                            </div>

                    </div>
                    </form>
                </div>
            </div>
        </div>
</div>
</section>
</div>
<!-- /.content-header -->

@endsection
