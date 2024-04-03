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
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Edit</a></li>
                        <li class="breadcrumb-item active">Country </li>
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
                            <h3 class="card-title">Edit Country</h3>
                        </div>
                        <form action="{{ url('admin/countries/edit',$getRecord->id) }}" class="form-horizontal" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Country<span
                                            style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="country" required
                                            placeholder="Enter Country" value="{{ $getRecord->country_name }}">
                                        <span style="color:red">{{ $errors->first('country') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Region Name <span style="color:red">*</span> </label>
                                    <div class="col-sm-10">
                                    <select name="region_id" id="" class="form-control" required>
                                        <option value="">Select Region Name</option>
                                        @foreach ($getRegion as  $region)
                                        <option value="{{ $region->id }}" {{ $region->id == $getRecord->region_id ? 'selected': '' }}>{{ $region->region_name }}</option>
                                        @endforeach

                                    </select>
                                    <span style="color:red">{{ $errors->first('region_id') }}</span>

                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <a href="{{ url('admin/countries') }}" class="btn btn-default">Back</a>

                                <button type="submit" class="btn btn-primary float-right">Update</button>
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
