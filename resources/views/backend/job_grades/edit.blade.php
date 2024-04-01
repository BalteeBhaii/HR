x
@extends('backend.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Job Grades</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Edit</a></li>
                        <li class="breadcrumb-item active">Job Grade </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Edit Job Grade </h3>
                        </div>
                        <form action="{{ url('admin/job_grades/edit',$getRecord->id) }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Grade Level<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="grade_level"
                                            value="{{ $getRecord->grade_level }}" placeholder="Job Grade ">
                                        <span class="color:red">{{ $errors->first('grade_level') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Lowest Sal<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="lowest_sal"
                                            value="{{ $getRecord->lowest_sal }}" placeholder="Lowest Salary ">
                                        <span class="color:red">{{ $errors->first('lowest_sal') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Highest Sal<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="highest_sal"
                                            value="{{ $getRecord->highest_sal }}" placeholder="Highest Salary ">
                                        <span class="color:red">{{ $errors->first('highest_sal') }}</span>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <a href="{{ url('admin/job_grades') }}" class="btn btn-default">Back</a>

                                <button type="submit" class="btn btn-primary float-right">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
</div>
<!-- /.content-header -->

@endsection
