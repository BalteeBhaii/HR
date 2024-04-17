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
                <div class="col-sm-6" style="text-align: right;">
                    <a href="{{ url('admin/manager/add') }}" class="btn btn-primary">Add Manager</a>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <section class="content">
        <div class="contianer-fluid">

            <div class="row">
                <section class="col-lg-12">


                    @include('message')

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Manager </h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Manager Name</th>
                                        <th>Manager Email</th>
                                        <th>Manager Mobile</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($getRecord as $value )
                                    <tr>
                                        <td>{{ $value->id  }}</td>
                                        <td>{{ $value->manager_name  }}</td>
                                        <td>{{ $value->manager_email  }}</td>
                                        <td>{{ $value->manager_number  }}</td>
                                        <td>

                                            <a href="{{ url('admin/manager/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ url('admin/manager/delete/'.$value->id) }}" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                                        </td>
                                    </tr>
                                    @empty

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
