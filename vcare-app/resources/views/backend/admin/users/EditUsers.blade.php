@extends('layouts.admin')

@section('title')
    Admin Edit User
@endsection


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= strtoupper('edit user') ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.AllUsers') }}">All Users</a></li>
                        <ages class="breadcrumb-item active">Add a New User</ages>
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
        <form role="form" method="POST" action="{{ route('admin.StoreEditUsers') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Full Name"
                        name="name" value="{{ $users["name"] }}">
                        <input type="text" style="display:none" class="form-control" id="id" placeholder="Enter Full id"
                        name="id" value="{{ $users["id"] }}">
                </div>
                @if (Session::has('name'))
                <div class="alert alert-danger col-12">{{ Session('name')[0] }}</div>
                @endif
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" placeholder="Enter Phone"
                        name="phone" value="{{ $users["phone"] }}">
                </div>
                @if (Session::has('phone'))
                <div class="alert alert-danger col-12">{{ Session('phone')[0] }}</div>
                @endif
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email"
                        name="email" value="{{ $users["email"] }}">
                </div>
                @if (Session::has('email'))
                <div class="alert alert-danger col-12">{{ Session('email')[0] }}</div>
                @endif
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password"
                        name="password" >
                </div>
                @if (Session::has('password'))
                <div class="alert alert-danger col-12">{{ Session('password')[0] }}</div>
                @endif

                <div class="form-group">
                    <label>Select Role</label>
                    <select class="form-control" name="roles">
                        <option value="{{ $users->roles }}" selected class="text-danger">{{ $users->roles }}</option>
                        <option value="admin" >Admin</option>
                        <option value="doctors" >Doctors</option>
                        <option value="user" >User</option>
                    </select>
                </div>
                @if (Session::has('role'))
                <div class="alert alert-danger col-12">{{ Session('role')[0] }}</div>
                @endif
                <div class="form-group">
                    <label>Select Active</label>
                    <select class="form-control" name="active">
                        @if ($users->is_active == 0)
                        <option value="{{ $users->is_active }} " class="text-danger" selected>Not Active</option>
                        @else
                        <option value="{{ $users->is_active }}" class="text-success" selected>Active</option>
                        @endif
                        <option value="0" >Not Active</option>
                        <option value="1" >Active</option>
                    </select>
                </div>
                @if (Session::has('active'))
                <div class="alert alert-danger col-12">{{ Session('active')[0] }}</div>
                @endif
                <div class="form-group">
                    <label>Select Confirm</label>
                    <select class="form-control" name="confirm">
                        @if ($users->is_confirmed == 0)
                        <option value="{{ $users->is_confirmed }} " class="text-danger" selected>Not Confirmed</option>
                        @else
                        <option value="{{ $users->is_confirmed }}" class="text-success" selected>Confirmed</option>
                        @endif
                        <option value="0" >Not Confirmed</option>
                        <option value="1" >Confirmed</option>
                    </select>
                </div>
                @if (Session::has('confirm'))
                <div class="alert alert-danger col-12">{{ Session('confirm')[0] }}</div>
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
