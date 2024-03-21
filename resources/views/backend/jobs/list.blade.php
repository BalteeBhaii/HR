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
                <div class="col-sm-6" style="text-align: right;">
                    <a href="{{ url('admin/jobs/add') }}" class="btn btn-primary">Add Jobs</a>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <section class="content ">
        <div class="contianer-fluid">

            <div class="row">
                <section class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Search Jobs</h3>
                        </div>

                        <form action="" method="GET">
                            <div class="card-body">
                                <div class="row">

                                    <div class="form-group col-md-1">
                                        <label for="">ID</label>
                                        <input type="text" name="id" class="form-control" placeholder="ID"
                                            value="{{ Request()->id }}">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="">Job Title</label>
                                        <input type="text" name="job_title" class="form-control"
                                            placeholder="Enter Job Title" value="{{ Request()->job_title }}">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="">Min Salary</label>
                                        <input type="number" name="min_salary" class="form-control"
                                            placeholder="Enter Min Salary" value="{{ Request()->min_salary }}">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="">Min Salary</label>
                                        <input type="number" name="max_salary" class="form-control"
                                            placeholder="Enter Max Salary" value="{{ Request()->max_salary }}">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <button class="btn btn-primary" type="submit" style="margin-top:30px;">Search
                                        </button>
                                        <a href="{{ url('admin/jobs') }}" class="btn btn-success"
                                            style="margin-top:30px;">Reset</a>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>

                    @include('message')

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Jobs List </h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Job Title</th>
                                        <th>Min Salary</th>
                                        <th>Max Salary</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Web Developer</td>
                                        <td>120000</td>
                                        <td>400000</td>
                                        <td>30/22/22</td>
                                        <td>
                                            <a href="" class="btn btn-info">View</a>
                                            <a href="" class="btn btn-primary">Edit</a>
                                            <a href="" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="100%">No Record Found....</td>
                                    </tr>

                                </tbody>

                            </table>

                        </div>
                    </div>


                </section>
            </div>

        </div>
    </section>
</div>
<!-- /.content-header -->
@endsection
