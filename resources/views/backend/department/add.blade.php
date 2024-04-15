x
@extends('backend.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Departments</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Add</a></li>
                        <li class="breadcrumb-item active">Departments </li>
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
                            <h3 class="card-title">Add Department </h3>
                        </div>
                        <form action="{{ url('admin/departments/add') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Department Name<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="department_name"
                                            value="{{ old('department_name') }}" placeholder="Department Name ">
                                        <span class="color:red">{{ $errors->first('department_name') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Manager Name <span style="color:red">*</span> </label>
                                    <div class="col-sm-10">
                                    <select name="manager_id" id="" class="form-control" required>
                                        <option value="">Select Manager Name</option>
                                        <option value="1">Mohsin</option>
                                        <option value="2">Ali Haider</option>
                                    </select>
                                    <span style="color:red">{{ $errors->first('manager_id') }}</span>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Location Name <span style="color:red">*</span> </label>
                                    <div class="col-sm-10">
                                    <select name="location_id" id="" class="form-control" required>
                                        <option value="">Select Location Name</option>
                                        @foreach ($getLocation as $location )
                                        <option value="{{ $location->id }}">{{ $location->city .' '. $location->street_address }}</option>
                                        @endforeach
                                    </select>
                                    <span style="color:red">{{ $errors->first('location_id') }}</span>

                                    </div>
                                </div>


                            </div>

                            <div class="card-footer">
                                <a href="{{ url('admin/jobs') }}" class="btn btn-default">Back</a>

                                <button type="submit" class="btn btn-primary float-right">Add</button>
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
