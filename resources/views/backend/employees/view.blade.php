
@extends('backend.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">View Employees</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">View</a></li>
                        <li class="breadcrumb-item active">Employees </li>
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
                            <h3 class="card-title">View Employee</ h3>
                        </div>
                        <form action="#" class="form-horizontal" method="POST" enctype="multipart/form-data">
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">ID</label>
                                    <div class="col-sm-10">
                                        {{ $getRecord->id }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">First Name</label>
                                    <div class="col-sm-10">
                                        {{ $getRecord->name }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Last Name</label>
                                    <div class="col-sm-10">
                                        {{ $getRecord->last_name }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Email ID</label>
                                    <div class="col-sm-10">
                                        {{ $getRecord->email }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">PHone Number</label>
                                    <div class="col-sm-10">
                                        {{ $getRecord->phone_number }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Hire Date</label>
                                    <div class="col-sm-10">
                                        {{ date('d-m-Y', strtotime($getRecord->hire_date)) }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Job ID</label>
                                    <div class="col-sm-10">
                                        {{ $getRecord->job_id }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Salary</label>
                                    <div class="col-sm-10">
                                        {{ $getRecord->salary }}
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Commission PCT</label>
                                    <div class="col-sm-10">
                                        {{ $getRecord->commission_pct }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Manager Id</label>
                                    <div class="col-sm-10">
                                        {{ $getRecord->manager_id }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Department ID</label>
                                    <div class="col-sm-10">
                                        {{ $getRecord->department_id }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Is Role</label>


                                    <div class="col-sm-10 ">
                                        <span class="{{ !empty($getRecord->is_role) ? 'badge bg-warning text-dark' : 'badge bg-info text-dark' }}">
                                            {{ !empty($getRecord->is_role) ? 'HR' : 'Employee' }}
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Created Date</label>
                                    <div class="col-sm-10">
                                        {{ date('d-m-Y H:i', strtotime($getRecord->created_at)) }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Updated Date</label>
                                    <div class="col-sm-10">
                                        {{ date('d-m-Y H:i ', strtotime($getRecord->updated_at)) }}
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <a href="{{ url('admin/employees') }}" class="btn btn-default">Back</a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
    @endsection
