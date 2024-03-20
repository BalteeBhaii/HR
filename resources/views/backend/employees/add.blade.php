@extends('backend.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Employee</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Add</a></li>
                        <li class="breadcrumb-item active">Employees </li>
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
                            <h3 class="card-title">Add Employee</ h3>
                        </div>
                        <form action="{{ url('admin/employees/add') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">First Name<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" required placeholder="Enter First  Name" value="{{ old('name') }}">
                                        <span style="color:red">{{ $errors->first('name') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Last Name </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="last_name"  placeholder="Enter Last  Name"  value="{{ old('last_name') }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Email ID <span style="color:red">*</span> </label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="email" required  placeholder="Enter Email ID" value="{{ old('email') }}">
                                        <span style="color:red">{{ $errors->first('email') }}</span>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Phone Number </label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="phone_number"  placeholder="Enter Phone Number" value="{{ old('phone_number') }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Hire Date <span style="color:red">*</span> </label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="hire_date" value="{{ old('date') }}">
                                        <span style="color:red">{{ $errors->first('date') }}</span>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Job Title <span style="color:red">*</span> </label>
                                    <div class="col-sm-10">
                                    <select name="job_id" id="" class="form-control" required  >
                                        <option value="">Select Job Title</option>
                                        <option value="1">Web Developer</option>
                                        <option value="2">PDF Developer</option>
                                    </select>
                                    <span style="color:red">{{ $errors->first('job_id') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Salary </label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="salary"  placeholder="Enter Salary" value="{{ old('salary') }}">
                                        <span style="color:red">{{ $errors->first('salary') }}</span>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Commission PCT <span style="color:red">*</span> </label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="commission_pct"  placeholder="Enter Commission PCT" value="{{ old('commission_pct') }}">
                                        <span style="color:red">{{ $errors->first('commission_pct') }}</span>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Manager Name <span style="color:red">*</span> </label>
                                    <div class="col-sm-10">
                                    <select name="manager_id" id="" class="form-control" required>
                                        <option value="">Select Manager Name</option>
                                        <option value="1">Mohsin</option>
                                        <option value="2">Ali Haider</option>
                                    </select>
                                    <span style="color:red">{{ $errors->first('manager_id') }}</span>

                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Department Name <span style="color:red">*</span> </label>
                                    <div class="col-sm-10">
                                    <select name="department_id" id="" class="form-control" required>
                                        <option value="">Select Department Name</option>
                                        <option value="1">LIMS</option>
                                        <option value="2">GPI</option>
                                    </select>
                                    <span style="color:red">{{ $errors->first('department_id') }}</span>

                                    </div>
                                </div>

                                <div class="card-footer">
                                    <a href="{{ url('admin/employees') }}" class="btn btn-default">Back</a>

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
