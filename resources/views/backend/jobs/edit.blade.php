@extends('backend.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Jobs</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Edit</a></li>
                        <li class="breadcrumb-item active">Jobs </li>
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
                            <h3 class="card-title">Edit Jobs</ h3>
                        </div>
                        <form action="{{ url('admin/jobs/edit/'.$getRecord->id) }}" class="form-horizontal" method="POST">
                            {{ csrf_field() }}
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Job Title<span
                                            style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="job_title" required
                                            placeholder="Enter Job Title" value="{{ $getRecord->job_title }}">
                                        <span style="color:red">{{ $errors->first('job_title') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Min Salary <span style="color:red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="min_salary"
                                            placeholder="Enter Min salary" value="{{ $getRecord->min_salary }}">
                                            <span class="color:red">{{ $errors->first('min_salary') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Max Salary <span
                                            style="color:red">*</span> </label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="max_salary" required
                                            placeholder="Enter Max Salary" value="{{ $getRecord->max_salary }}">
                                            <span style="color:red">{{ $errors->first('max_salary') }}</span>
                                        <span style="color:red">{{ $errors->first('max_salary') }}</span>

                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <a href="{{ url('admin/jobs') }}" class="btn btn-default">Back</a>

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
