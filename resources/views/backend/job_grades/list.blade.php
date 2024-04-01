@extends('backend.layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Job Grade</h1>
                </div><!-- /.col -->
                <div class="col-sm-6" style="text-align: right;">
                    <a href="{{ url('admin/job_grades/add') }}" class="btn btn-primary">Add Job Grade</a>

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
                            <div class="card-title">Search Job Grade</div>
                        </div>
                        <form action="" method="GET">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="">ID</label>
                                        <input type="text" name="id" class="form-control" value="{{ Request::get('id') }}" placeholder="ID">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Grade Level</label>
                                        <input type="text" name="grade_level" class="form-control" value="{{ Request::get('grade_level') }}" placeholder="Grade Level">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <button class="btn btn-primary" type="submit" style="margin-top:30px;">Search</button>
                                        <a href="{{ url('admin/job_grades') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @include('message')

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Job Grade List </h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>

                                        <th>ID</th>
                                        <th>Grade Level</th>
                                        <th>Lowest Sal</th>
                                        <th>Highest Sal</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($getRecord as $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->grade_level }}</td>
                                        <td>{{ $value->lowest_sal }}</td>
                                        <td>{{ $value->highest_sal }}</td>
                                        <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                                        <td>{{ date('d-m-Y', strtotime($value->updated_at)) }}</td>
                                        <td><a href="{{ url('admin/job_grades/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ url('admin/job_grades/delete/'.$value->id) }}" onclick="return confirm('Are you sure you want to delete')" class="btn btn-danger">Delete</a></td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="100%">No Record Found.</td>
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
