@extends('layouts.frontend')
@section('title')
    Doctors
@endsection

@section('content')
<div class="page-wrapper">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Doctors</li>
            </ol>
        </nav>
        <div class="doctors-grid">
            @if (!empty($doctors[0]))
            @foreach($doctors as $doctor)
            @php
                $doctor_status = App\Models\User::where('id',$doctor->user_id)->first();
            @endphp
            {{-- @dd($doctor_status) --}}
            @if ($doctor_status->is_active == "1" && $doctor_status->is_confirmed == "1")
            <li class="splide__slide">
                <div class="card p-2" style="width: 18rem;">
                    <img src="{{ asset('assets/img/doctors/' . $doctor['img_doctor']) }}"
                        class="card-img-top rounded-circle card-image-circle" alt="major">
                    <div class="card-body d-flex flex-column gap-1 justify-content-center">
                        <h4 class="card-title fw-bold text-center">DR.<?= strtoupper($doctor['name_doctor']) ?></h4>
                        <h6 class="card-title fw-bold text-center"><?= strtoupper($doctor['name_major']) ?></h6>
                        <a href="{{ route('storeAppointment',$doctor['id']) }}"
                            class="btn btn-outline-primary card-button">Book an
                            appointment</a>
                    </div>
                </div>
            </li>
            @endif
            @endforeach

            @else
            <div class="alert alert-danger col-12" role="alert">
                NO DOCTORS YET!!!
              </div>
            @endif

        </div>


    </div>
</div>


@endsection
