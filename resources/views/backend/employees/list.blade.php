@extends('backend.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Employees</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6" style="text-align: right;">
                        <a href="{{ url('admin/employees/add') }}" class="btn btn-primary">Add Employees</a>

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
                                <h3 class="card-title">Search Employee</h3>
                            </div>

                            <form action="{{ url('admin/employees') }}" method="GET">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="form-group col-md-1">
                                            <label for="">ID</label>
                                            <input type="text" name="id" class="form-control" placeholder="ID" value="{{ Request()->id }}">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">First Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter First Name" value="{{ Request()->name }}">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">Last Name</label>
                                            <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" value="{{ Request()->last_name }}">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">Email</label>
                                            <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{ Request()->email }}">

                                        </div>

                                        <div class="form-group col-md-2">
                                            <button class="btn btn-primary" type="submit" style="margin-top:30px;">Search
                                            </button>
                                            <a href="{{ url('admin/employees') }}" class="btn btn-success"
                                                style="margin-top:30px;">Reset</a>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>

                        @include('message')

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Employee List </h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>IsRole</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->name ?? '' }}</td>
                                                <td>{{ $value->last_name ?? '' }}</td>
                                                <td>{{ $value->email ?? '' }}</td>
                                                <td>{{ !empty($value->is_role) ? 'HR' : 'Employees' }}</td>
                                                <td>
                                                    <a href="" class="btn btn-info">View</a>
                                                    <a href="" class="btn btn-primary">Edit</a>
                                                    <a href="" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                           @empty
                                           <tr>
                                            <td colspan="100%">No Record Found....</td>
                                           </tr>
                                        @endforelse
                                    </tbody>

                                </table>
                                <div class="" style="padding: 10px; float:right">
                                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                                </div>
                            </div>
                        </div>


                    </section>
                </div>

            </div>
        </section>
    </div>
    <!-- /.content-header -->
@endsection
