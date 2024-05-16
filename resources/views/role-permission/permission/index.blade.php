@extends('backend.layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Permission</h1>
                </div><!-- /.col -->
                <div class="col-sm-6" style="text-align: right;">

                    <a href="{{ url('admin/permissions/create') }}" class="btn btn-primary">Add Permission</a>

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
                            <h3 class="card-title">Permission List </h3>
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
                                    @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->id }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>
                                            <a href="{{ url('admin/permissions/'.$permission->id.'/edit') }}" class="btn btn-success">Edit</a>
                                            <a href="{{ url('admin/permissions/delete/'.$permission->id) }}" class="btn btn-danger mx-2" onclick="return confirm('Are you sure you want to delete ?')">Delete</a>
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
