@extends('backend.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Attendance</h1>
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
                                            <th>Profile Image</th>
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
                                                <td>
                                                    @if(!empty($value->profile_image))
                                                    @if(file_exists(public_path('upload/'.$value->profile_image)))
                                                      <img src="{{ url('upload/'.$value->profile_image) }}" height="80px" width="80px" class="rounded-circle"/>
                                                      @endif
                                                    @endif
                                                </td>
                                                <td><span class="{{ !empty($value->is_role) ? 'badge bg-warning text-dark' : 'badge bg-info text-dark' }}">
                                                    {{ !empty($value->is_role) ? 'HR' : 'Employee' }}
                                                </span></td>
                                                <td>
                                                    <a href="{{ url('admin/employees/view/'.$value->id) }}" class="btn btn-info">View</a>
                                                    <a href="{{ url('admin/employees/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                                                    <a href="{{ url('admin/employees/delete/'.$value->id) }}" class="btn btn-danger"
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
