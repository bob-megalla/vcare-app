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
            @foreach ($doctors as $doc)
            <li class="splide__slide">
                <div class="card p-2" style="width: 18rem;">
                    <img src="assets/img/doctors/{{ $doc['img_doctor'] }}"
                        class="card-img-top rounded-circle card-image-circle" alt="major">
                    <div class="card-body d-flex flex-column gap-1 justify-content-center">
                        <h4 class="card-title fw-bold text-center">Dr. {{ ucwords($doc['name_doctor']) }}</h4>
                        @php
                            $majorDoctor = App\Models\Majors::where('id',$doc['major_id'])->first();
                        @endphp
                        <h6 class="card-title fw-bold text-center">{{ ucwords($majorDoctor['name_major']) }}</h6>
                        <a href="{{ route('storeAppointment',$doc['id']) }}"
                            class="btn btn-outline-primary card-button">Book an
                            appointment</a>
                    </div>
                </div>
            </li>
            @endforeach


        </div>
        <nav class="mt-5" aria-label="navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link page-prev" href="#" aria-label="Previous">
                        <span aria-hidden="true">
                            < </span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link page-next" href="#" aria-label="Next">
                        <span aria-hidden="true"> > </span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

@endsection
