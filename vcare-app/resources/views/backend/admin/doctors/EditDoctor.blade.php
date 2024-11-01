@extends('layouts.admin')

@section('title')
    Admin Edit Doctors
@endsection


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= strtoupper('edit doctors') ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.AllDoctors') }}">All Doctors</a></li>
                        <ages class="breadcrumb-item active">Edit Doctor</ages>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        @if (Session::has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form role="form" method="POST" action="{{ route('admin.StoreEditDoctor') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="doctorName">Doctor Name</label>
                    <input type="text" class="form-control" id="doctorName" placeholder="Enter Doctor Name"
                        name="doctorName" value="{{ $doctors->name_doctor }}">
                        <input type="hidden" class="form-control" id="doctorName" placeholder="Enter Doctor Name"
                        name="id" value="{{ $doctors->id }}">
                </div>
                @if (Session::has('doctorName'))
                <div class="alert alert-danger col-12">{{ Session('doctorName')[0] }}</div>
                @endif
                <div class="form-group">
                    <label>Select Major</label>
                    @php
                        $allMajors = App\Models\Majors::all();
                        $selected_major = App\Models\Majors::where('id',$doctors->major_id )->first();
                    @endphp
                    <select class="form-control" name="major_id">
                        @if (!empty($allMajors))
                        <option value="{{ $doctors->major_id }}" selected class="text-danger">{{ $selected_major->name_major }} </option>
                        @foreach ($allMajors as $major)
                        <option value='<?= $major["id"] ?>'><?= $major["name_major"] ?></option>
                        @endforeach
                        @else
                        <option selected disabled>There is No Major Add Yet </option>
                        @endif
                    </select>
                </div>
                @if (Session::has('major_id'))
                <div class="alert alert-danger col-12">{{ Session('major_id')[0] }}</div>
                @endif
                <div class="form-group">
                    <label>Select Doctor USer</label>
                        @php
                        $allDoctors = App\Models\User::where('roles','doctors')->get();
                        $selected_user = App\Models\User::where('id',$doctors->user_id)->first();
                        @endphp
                    <select class="form-control" name="user_id">
                        @if (!empty($allDoctors))
                        <option value="{{ $doctors->user_id }}" selected class="text-danger">{{ $selected_user->name }} </option>
                        @foreach ($allDoctors as $doc)


                        <option value='<?= $doc["id"] ?>'><?= $doc["name"] ?></option>
                        @endforeach
                        @else
                        <option selected disabled>There is No Doctors Add Yet </option>
                        @endif
                    </select>
                </div>
                @if (Session::has('user_id'))
                <div class="alert alert-danger col-12">{{ Session('user_id')[0] }}</div>
                @endif
                <div class="form-group">
                    <label for="DoctorImage">Doctor Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="DoctorImage" name="DoctorImage">
                            <label class="custom-file-label" for="DoctorImage">Choose Image</label>
                        </div>

                    </div>
                </div>
                <div class="col-1">
                    <img src="{{ asset('assets/img/doctors/' . $doctors['img_doctor'] ) }}"
                    class="card-img-top rounded-circle card-image-circle"
                    width="50" height="50" alt="major">
                </div>
                @if (Session::has('DoctorImage'))
                <div class="alert alert-danger col-12">{{ Session('DoctorImage')[0] }}</div>
                @endif

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.content -->
</div>
@endsection
