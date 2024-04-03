@extends('backend.layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Country</h1>
                </div><!-- /.col -->
                <div class="col-sm-6" style="text-align: right;">
                    <a href="{{ url('admin/countries/add') }}" class="btn btn-primary">Add Country</a>

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
                            <h3 class="card-title">Country </h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Country Name</th>
                                        <th>Region Name</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($getRecord  as $value )
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->country_name }}</td>
                                        <td>{{ $value->get_region_name->region_name }}</td>
                                        <td>{{ date('d-m-Y' , strtotime($value->created_at)) }}</td>
                                        <td>
                                            <a href="{{ url('admin/countries/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ url('admin/countries/delete/'.$value->id) }}" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                                        </td>
                                    </tr>
                                    @empty

                                    <tr>
                                        <td colspan="100%">No Record Found....</td>
                                    </tr>

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
