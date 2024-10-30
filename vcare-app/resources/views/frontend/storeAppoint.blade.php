@extends('layouts.frontend')
@section('title')
    Store Appointment
@endsection

@section('content')
    <div class="page-wrapper">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item">
                        <a class="text-decoration-none" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a class="text-decoration-none" href="{{ route('indexDoctors') }}">Doctors</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Dr.
                        {{ ucwords($doctors['name_doctor']) }}
                    </li>
                </ol>
            </nav>

            <div class="d-flex flex-column gap-3 details-card doctor-details">

                <div class="details d-flex gap-2 align-items-center">
                    <img src="{{ asset('assets/img/doctors/' . $doctors['img_doctor']) }}" alt="doctor"
                        class="img-fluid rounded-circle" height="150px" width="150px" />
                    <div class="details-info d-flex flex-column gap-3">
                        <h4 class="card-title fw-bold">DR. {{ strtoupper($doctors['name_doctor']) }}</h4>
                        <h6 class="card-title fw-bold">
                            @php
                                $majorDoctor = App\Models\Majors::where('id', $doctors['major_id'])->first();
                            @endphp
                            Doctor {{ strtoupper($doctors['name_doctor']) }} Works in Major
                            {{ strtoupper($majorDoctor['name_major']) }} and more info about the doctor in summary
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sit qui ipsa totam voluptatum a eius.
                        </h6>
                    </div>
                </div>
                <hr />
                @error('success')
                <div class="alert alert-success">{{ $message }}</div>

                @enderror
                <form class="form" method="POST" action="{{ route('storeAppointmentPOST') }}">
                    @csrf
                    <div class="form-items">
                        <div class="mb-3">
                            <label class="form-label required-label" for="name">Name</label>
                            <input type="text" class="form-control mb-3" id="name" name="name"
                                value="{{ old('name') }}" />
                            <input type="text" style="display: none" class="form-control" id="doctor_id" name="doctor_id"
                                value="{{ $doctors['user_id'] }}" />
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="phone">Phone</label>
                            <input type="tel" class="form-control mb-3" id="phone" name="phone"
                                value="{{ old('phone') }}" />
                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="email">Email</label>
                            <input type="email" class="form-control mb-3" id="email" name="email"
                                value="{{ old('email') }}" />
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Confirm Booking
                    </button>
                </form>

            </div>
        </div>
    </div>
@endsection
