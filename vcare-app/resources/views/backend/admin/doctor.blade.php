@extends('layouts.admin')

@section('title')
    Admin Doctors
@endsection


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= strtoupper('doctors') ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Doctors</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @if (Session::has('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <!-- START -->
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Doctor Name</th>
                                        <th>Major</th>
                                        <th>Image</th>
                                        <th>User Name </th>
                                        <th>
                                            <a href="{{ route('admin.NewDoctor') }}" title="Add A New Doctor"
                                                class="btn btn-block btn-outline-success">Add</a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($doctors as $doctor)
                                    <tr>
                                        <td>{{ $i++  }}</td>
                                        <td>DR. {{ $doctor->name_doctor }}</td>
                                        @php
                                            $major = App\Models\Majors::where('id',$doctor->major_id)->first();
                                            $userNameID = App\Models\User::where('id',$doctor->user_id)->first();
                                        @endphp
                                        <td>{{  $major->name_major }}</td>
                                        <td>
                                            <div class="col-3">
                                                <img src="{{ asset('assets/img/doctors/' . $doctor['img_doctor'] ) }}"
                                                class="card-img-top rounded-circle card-image-circle"
                                                width="50" height="50" alt="major">
                                            </div>
                                        </td>
                                        <td>{{  $userNameID->name }}</td>
                                        <td>
                                            <a href="{{ route('admin.EditDoctor',$doctor['id'] ) }}"
                                                title="Edit This doctor"
                                                class="btn btn-block btn-outline-info">Edit</a>
                                                <form method="POST" action="{{ route('admin.DeleteDoctor',$major->id) }}">
                                                    @csrf
                                                    <button title="Delete This doctor"
                                                    class="btn btn-block btn-outline-danger">Delete</button>
                                                </form>


                                        </td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>


                    <!-- END -->
                </div>
                <!-- /.col-md-6 -->

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
