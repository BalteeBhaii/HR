@extends('backend.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manager</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Add</a></li>
                        <li class="breadcrumb-item active">Manager </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Add Manager </h3>
                        </div>
                        <form action="{{ url('admin/manager/add') }}" class="form-horizontal" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Manager Name<span
                                            style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="manager_name" required
                                            placeholder="Enter Manager Name" value="{{ old('manager_name') }}">
                                        <span style="color:red">{{ $errors->first('manager_name') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Manager Email<span
                                            style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="manager_email" required
                                            placeholder="Enter Manager Email" value="{{ old('manager_email') }}">
                                        <span style="color:red">{{ $errors->first('manager_email') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Manager Mobile<span
                                            style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="manager_mobile" required
                                            placeholder="Enter Manager Mobile Number" value="{{ old('manager_mobile') }}">
                                        <span style="color:red">{{ $errors->first('manager_mobile') }}</span>
                                    </div>
                                </div>


                            </div>

                            <div class="card-footer">
                                <a href="{{ url('admin/manager') }}" class="btn btn-default">Back</a>

                                <button type="submit" class="btn btn-primary float-right">Add</button>
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
