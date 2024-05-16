@extends('backend.layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Role</h1>
                </div><!-- /.col -->
                <div class="col-sm-6" style="text-align: right;">

                    <a href="{{ url('admin/roles/create') }}" class="btn btn-primary">Add Role</a>

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
                            <h3 class="card-title">Role List </h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th width="40%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <a href="{{ url('admin/roles/'.$role->id.'/edit') }}" class="btn btn-success">Edit</a>
                                            <a href="{{ url('admin/roles/'.$role->id.'/give-permissions') }}" class="btn btn-success">Add / Edit Role Permission</a>
                                            <a href="{{ url('admin/roles/delete/'.$role->id) }}" class="btn btn-danger mx-2"   onclick="return confirm('Are you sure you want to delete?')">Delete</a>

                                        </td>
                                    </tr>
                                    @endforeach
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
