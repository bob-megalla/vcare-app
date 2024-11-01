@extends('layouts.admin')

@section('title')
    Admin New Major
@endsection


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= strtoupper('new major') ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.AllMajors') }}">All Major</a></li>
                        <ages class="breadcrumb-item active">Add a New Major</ages>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        @if (Session::has('success'))
        <div class="alert alert-success col-12">{{ Session('success') }}</div>
        @endif

        <form role="form" method="POST" action="{{ route('admin.StoreNewMajors') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name_major">Major Name</label>
                    <input type="text" class="form-control" id="name_major" placeholder="Enter Major Name"
                        name="name_major">
                </div>
                @if (Session::has('name_major'))
                <div class="alert alert-danger col-12">{{ Session('name_major')[0] }}</div>
                @endif
                <div class="form-group">
                    <label for="img_major">Major Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="img_major" name="img_major">
                            <label class="custom-file-label" for="img_major">Choose Image</label>
                        </div>

                    </div>
                </div>
                @if (Session::has('img_major'))
                <div class="alert alert-danger col-12">{{ Session('img_major')[0] }}</div>
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
