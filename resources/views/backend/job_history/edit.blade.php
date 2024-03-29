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
                        <li class="breadcrumb-item"><a href="#">Edit</a></li>
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
                            <h3 class="card-title">Edit Job History </h3>
                        </div>
                        <form action="{{ url('admin/job_history/edit/'.$getRecord->id) }}" class="form-horizontal" method="POST">
                            {{ csrf_field() }}
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Employee Name<span
                                            style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <select name="employee_id" id="employee_id" class="form-control">
                                            <option value="">Employees</option>
                                            @foreach($getEmployees as $value)
                                            <option value="{{ $value->id }}" {{ $value->id == $getRecord->employee_id  ? 'selected' : ''  }}>{{ $value->name }} {{ $value->last_name }}
                                                - {{ $value->email }}</option>
                                            @endforeach
                                        </select>
                                        <span style="color:red">{{ $errors->first('employee_id') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Start Date<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="start_date" value="{{ $getRecord->start_date }}">
                                        <span class="color:red">{{ $errors->first('start_date') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">End Date<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="end_date" value="{{ $getRecord->end_date }}">
                                        <span class="color:red">{{ $errors->first('end_date') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Job Name<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-10">
                                        <select name="job_id" id="job_id" class="form-control">
                                            <option value="">Jobs</option>
                                            @foreach ($getJobs as $value )
                                            <option value="{{ $value->id }}" {{ $value->id == $getRecord->job_id ? 'selected' : '' }}>{{ $value->job_title }}</option>
                                            @endforeach
                                        </select>
                                        <span class="color:red">{{ $errors->first('job_id') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Department Name<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-10">
                                        <select name="department_id" id="department_id" class="form-control">
                                            <option value="">Department</option>
                                            <option value="0">Lims</option>
                                            <option value="1">GPI</option>
                                        </select>
                                        <span class="color:red">{{ $errors->first('department_id') }}</span>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <a href="{{ url('admin/job_history') }}" class="btn btn-default">Back</a>

                                <button type="submit" class="btn btn-primary float-right">update</button>
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
