@extends('layouts.admin')

@section('title')
    Admin Booked
@endsection


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= strtoupper('booked') ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <ages class="breadcrumb-item active">All Booked</ages>
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

                    <!-- START -->
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <thead class="text-center">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Doctor Name</th>
                                        <th>Is Completed</th>
                                        <th>Created At</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                 @foreach ($BookedDoctors as $booked)

                                 <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $booked['name'] }}</td>
                                    <td>{{ $booked['phone'] }}</td>
                                    <td>{{ $booked['email'] }}</td>
                                    @php
                                        $doctorName = App\Models\User::where('id', $booked['doctor_id'])->first();
                                    @endphp
                                    <td>DR. {{ ucfirst($doctorName['name'] ) }}</td>
                                    {{-- <td>DR. {{ ucfirst($booked['doctor_id'] ) }}</td> --}}
                                    @if($booked['is_compeleted'] == "0")
                                    <td class=" text-danger">Not Completed</td>
                                    @else
                                    <td class="pl-5 text-success">Yes</td>
                                    @endif
                                    <td> <span class="date"> <i class="far fa-clock mr-1"></i>
                                            {{ date('d F Y', strtotime($booked['created_at'])) }}
                                        </span></td>
                                   
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
