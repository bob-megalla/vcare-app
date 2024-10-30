@extends('layouts.user')

@section('title')
    User DashBoard
@endsection


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">User - Dashboard - Appointment </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">User - Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <table class="table table-hover">
                    <thead>
                        @php
                            $i = 1;
                        @endphp
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Your Info</th>
                            <th scope="col">Doctor Name</th>
                            <th scope="col">Booked At</th>
                            <th scope="col">Compeleted</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($BookedDoctors as $booked)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>
                                    {{ ucwords($booked->name) }} <br>
                                    {{ $booked->phone }} <br>
                                    {{ $booked->email }}
                                </td>
                                @php
                                    $doctor = App\Models\Doctors::where('user_id', $booked->doctor_id)->first();
                                @endphp
                                <td>Dr.{{ ucwords($doctor->name_doctor) }}</td>
                                <td>{{ date('d F-Y', strtotime($booked->created_at)) }}</td>
                                @if ($booked->is_compeleted === '1')
                                    <td class="text-success">Complete</td>
                                @else
                                    <td class="text-danger">Not Complete</td>
                                @endif
                            </tr>
                        @endforeach


                    </tbody>
                </table>

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection



