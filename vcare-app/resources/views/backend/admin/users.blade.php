@extends('layouts.admin')

@section('title')
    Admin Users
@endsection


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= strtoupper('users') ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Users</li>
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
                                        <th>Full Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Is Active</th>
                                        <th>Is Confirmed</th>
                                        <th>
                                            <a href="{{ route('admin.AddUsers') }}" title="Add A New User"
                                                class="btn btn-block btn-outline-success">Add</a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @php
                                       $i = 1;
                                   @endphp
                                   @foreach ($user as $user)
                                   <tr>
                                       <td>{{ $i++ }}</td>
                                       <td>{{ $user['name'] }}</td>
                                       <td>{{ $user['phone'] }}</td>
                                       <td>{{ $user['email'] }}</td>
                                       <td>{{ ucwords($user['roles']) }}</td>
                                       {{-- <td>{{ ucwords($user['is_active']) }}</td> --}}
                                       @if ($user['is_active'] == "1")
                                       <td class="text-success">Active</td>
                                       @else
                                       <td class="text-danger">Not Active</td>
                                       @endif
                                       @if ($user['is_confirmed'] == "1")
                                       <td class="text-success">Confirmed</td>
                                       @else
                                       <td class="text-danger">Not Confirmed</td>
                                       @endif

                                       <td>
                                           <a href="{{ route('admin.EditUsers',$user['id']) }}"
                                               title="Edit This user"
                                               class="btn btn-block btn-outline-info">Edit</a>
                                               <form method="POST" action="{{ route('admin.DeleteUsers',$user['id'])}}">
                                                @csrf
                                                <button title="Delete This user"
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
