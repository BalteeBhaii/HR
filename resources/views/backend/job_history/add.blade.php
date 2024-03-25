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
                    <h1 class="m-0">Job History</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Add</a></li>
                        <li class="breadcrumb-item active">Job History </li>
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
                            <h3 class="card-title">Add Job History </h3>
                        </div>
                        <form action="{{ url('admin/job_history/add') }}" class="form-horizontal" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Employee Name<span
                                            style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <select name="" id="" class="form-control">
                                            <option value="">Employees</option>
                                            @foreach($getEmployees as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }} {{ $value->last_name }} - {{ $value->email }}</option>
                                            @endforeach
                                        </select>
                                        <span style="color:red">{{ $errors->first('job_title') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Start Date<span style="color:red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="start_date"
                                             value="{{ old('start_date') }}">
                                            <span class="color:red">{{ $errors->first('start_date') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">End Date<span style="color:red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="end_date"
                                            value="{{ old('end_date') }}">
                                            <span class="color:red">{{ $errors->first('end_date') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Job Name<span style="color:red">*</span></label>
                                    <div class="col-sm-10">
                                        <select name="" id="" class="form-control">
                                            <option value="">Jobs</option>
                                            @foreach ($getJobs as $value )
                                                <option value="{{ $value->id }}">{{ $value->job_title }}</option>
                                            @endforeach
                                        </select>
                                            <span class="color:red">{{ $errors->first('end_date') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Department Name<span style="color:red">*</span></label>
                                    <div class="col-sm-10">
                                        <select name="" id="" class="form-control">
                                            <option value="">Department</option>
                                            <option value="">Lims</option>
                                            <option value="">GPI</option>
                                        </select>
                                            <span class="color:red">{{ $errors->first('end_date') }}</span>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <a href="{{ url('admin/jobs') }}" class="btn btn-default">Back</a>

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
