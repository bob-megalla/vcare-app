@extends('layouts.admin')

@section('title')
    Admin Majors
@endsection


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= strtoupper('majors') ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Majors</li>
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
                                        <th>Major Name</th>
                                        <th>Image</th>
                                        <th>
                                            <a href="{{ route('admin.NewMajors') }}" title="Add A New Major"
                                                class="btn btn-block btn-outline-success">Add</a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($majors as $major)
                                    <tr>
                                        <td>{{ $i++  }}</td>
                                        <td>{{ $major['name_major'] }}</td>
                                        <td>
                                            <div class="col-3">
                                                <img src="{{ asset('assets/img/majors/'. $major->img_major)}}"
                                                    class="card-img-top rounded-circle card-image-circle"
                                                    width="50" height="50" alt="major">
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.EditMajors',$major['id']) }}"
                                                title="Edit This major"
                                                class="btn btn-block btn-outline-info mb-3">Edit</a>

                                                <form method="POST" action="{{ route('admin.DeleteMajor',$major->id) }}">
                                                    @csrf
                                                    <button title="Delete This major"
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
