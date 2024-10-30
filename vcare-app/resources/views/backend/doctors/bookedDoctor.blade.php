@extends('layouts.doctor')

@section('title')
    Doctor Booked
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
            @if (Session::has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-hover">
                <thead>
                    @php
                        $i = 1;
                    @endphp
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">email</th>
                        <th scope="col">Status</th>
                        <th scope="col">Booked At</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($BookedDoctors as $booked)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>
                                {{ ucwords($booked->name) }}
                            </td>
                           <td>{{ $booked->phone }}</td>
                           <td> {{ $booked->email }}</td>
                           @if ($booked->is_compeleted === '1')
                               <td class="text-success">Complete</td>
                           @else
                               <td class="text-danger">Not Complete</td>
                           @endif
                            <td>{{ date('d F-Y', strtotime($booked->created_at)) }}</td>
                            <td>
                                @if ($booked->is_compeleted === '1')
                                <a href="{{ route('doctor.changeStatusBooked',$booked->id) }}"
                                    title="Change Status To Not Compelete"
                                    class="btn btn-block btn-outline-info">UnCompelete</a>
                                @else
                                <a href="{{ route('doctor.changeStatusBooked',$booked->id) }}"
                                title="Change Status To Compelete"
                                class="btn btn-block btn-outline-info">Compelete</a>
                                @endif
                                <a href="{{ route('doctor.deleteBooked',$booked->id) }}"
                                    title="Delete This doctor"
                                    class="btn btn-block btn-outline-danger">Delete</a>

                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
