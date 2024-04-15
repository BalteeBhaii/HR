@extends('backend.layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Department</h1>
                </div><!-- /.col -->
                <div class="col-sm-6" style="text-align: right;">
                    <a href="{{ url('admin/departments/add') }}" class="btn btn-primary">Add Departments</a>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <section class="content ">
        <div class="contianer-fluid">

            <div class="row">
                <section class="col-lg-12">


                    @include('message')

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Department List </h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Department Name</th>
                                        <th>Manager Name</th>
                                        <th>Location Name</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($getRecord as $record )
                                    <tr>
                                        <td>{{ $record->id }}</td>
                                        <td>{{ $record->department_name }}</td>
                                        <td>{{ $record->manager_id }}</td>
                                        <td>{{ $record->city .' '. $record->street_address  }}</td>
                                        <td>{{ date('d-m-Y H:i A' , strtotime($record->created_at)) }}</td>
                                        <td>
                                            <a href="{{ url('admin/departments/edit/'.$record->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ url('admin/departments/delete/'.$record->id) }}" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <td colspan="100%">No Record Found..</td>
                                    @endforelse

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
