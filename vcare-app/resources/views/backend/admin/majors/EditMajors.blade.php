@extends('layouts.admin')

@section('title')
    Admin Edit Major
@endsection


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= strtoupper('edit major') ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.AllMajors') }}">All Majors</a></li>
                        <ages class="breadcrumb-item active">Edit Major</ages>
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
        <form role="form" method="POST" action="{{ route('admin.StoreEditMajors') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name_major">Doctor Name</label>
                    <input type="text" class="form-control" id="name_major" placeholder="Enter Doctor Name"
                        name="name_major" value="<?= $majors["name_major"] ?>">
                        <input type="text" style="display:none" class="form-control" id="id" placeholder="Enter Doctor Name"
                        name="id" value="<?= $majors["id"] ?>">
                </div>
                @if (Session::has('name_major'))
                <div class="alert alert-danger col-12">{{ Session('name_major')[0] }}</div>
                @endif

                <div class="form-group">
                    <label for="img_major">Major Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="img_major" name="img_major" value="<?= $majors['img_major'] ?>">
                            <label class="custom-file-label" for="img_major">Choose Image</label>
                        </div>
                        <div class="col-1">
                            <img src="{{ asset('assets/img/majors/' . $majors['img_major']) }} ?>"
                                class="card-img-top rounded-circle card-image-circle" width="50" height="50"
                                alt="major">
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
