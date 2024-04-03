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
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Add</a></li>
                        <li class="breadcrumb-item active">Location </li>
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
                            <h3 class="card-title">Add Location </h3>
                        </div>
                        <form action="{{ url('admin/locations/add') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Street Address<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="street_address" required placeholder="Street Address" value="{{ old('street_address') }}">
                                        <span style="color:red">{{ $errors->first('street_address') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Postal Code</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="postal_code"  placeholder="Enter Postal Code"  value="{{ old('postal_code') }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">City <span style="color:red">*</span> </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="city" required  placeholder="Enter City" value="{{ old('city') }}">
                                        <span style="color:red">{{ $errors->first('city') }}</span>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">State Province <span style="color:red">*</span> </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="state_province" required  placeholder="Enter State Province" value="{{ old('state_province') }}">
                                        <span style="color:red">{{ $errors->first('state_province') }}</span>

                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Country <span style="color:red">*</span> </label>
                                    <div class="col-sm-10">
                                    <select name="country_id" id="" class="form-control" required  >
                                        <option value="">Select Country</option>
                                        @foreach($getRecord as $value)
                                            <option value="{{ $value->id }}">{{ $value->country_name }}</option>
                                        @endforeach
                                    </select>
                                    <span style="color:red">{{ $errors->first('country_id') }}</span>
                                    </div>
                                </div>


                                <div class="card-footer">
                                    <a href="{{ url('admin/locations') }}" class="btn btn-default">Back</a>

                                    <button type="submit" class="btn btn-primary float-right">Add</button>
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
