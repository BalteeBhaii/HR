@extends('backend.layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Location</h1>
                </div><!-- /.col -->
                <div class="col-sm-6" style="text-align: right;">
                    <a href="{{ url('admin/locations/add') }}" class="btn btn-primary">Add Location</a>

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
                            <h3 class="card-title">Location </h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Street Address</th>
                                        <th>Postal code</th>
                                        <th>City</th>
                                        <th>State Province</th>
                                        <th>Country</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($getRecord  as $value )
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->street_address }}</td>
                                        <td>{{ $value->postal_code }}</td>
                                        <td>{{ $value->city }}</td>
                                        <td>{{ $value->state_province }}</td>
                                        <td>{{ $value->country_name }}</td>

                                        <td>
                                            <a href="{{ url('admin/locations/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ url('admin/locations/delete/'.$value->id) }}" class="btn btn-danger"
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
