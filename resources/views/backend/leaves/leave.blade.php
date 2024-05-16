@extends('backend.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Leave</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Apply</a></li>
                        <li class="breadcrumb-item active">Leave </li>
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
                            <h3 class="card-title">Apply Leave</h3>
                        </div>
                        <form action="{{ url('admin/leave/apply') }}" class="form-horizontal" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Employee Name<span
                                            style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" required value="{{ auth()->user()->name ?? '' }}">
                                        <span style="color:red">{{ $errors->first('name') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Employee Email<span
                                            style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="email"  value="{{ auth()->user()->email ?? '' }}">
                                        <span style="color:red">{{ $errors->first('email') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Start Date<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="start_date"
                                            value="{{ old('start_date') }}">
                                        <span class="color:red">{{ $errors->first('start_date') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">End Date<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="end_date"
                                            value="{{ old('end_date') }}">
                                        <span class="color:red">{{ $errors->first('end_date') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Reason<span
                                            style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <textarea name="reason" class="form-control"></textarea>
                                        <span style="color:red">{{ $errors->first('reason') }}</span>
                                    </div>
                                </div>



                            </div>

                            <div class="card-footer">
                                <a href="{{ url('admin/countries') }}" class="btn btn-default">Back</a>

                                <button type="submit" class="btn btn-primary float-right">Apply</button>
                            </div>

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
