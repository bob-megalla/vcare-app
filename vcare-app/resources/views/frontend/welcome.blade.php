@extends('layouts.frontend')
@section('title')
    Home
@endsection

@section('content')
    <div class="container-fluid bg-blue text-white pt-3">
        <div class="container pb-5">
            <div class="row gap-2">
                <div class="col-sm order-sm-2">
                    <img src="{{ asset('assets/img/'.$settings['question_img']) }}" class="img-fluid banner-img banner-img" alt="banner-image" height="200">
                </div>
                <div class="col-sm order-sm-1">
                    <h1 class="h1">{{ ucwords($settings['question_home']) }}</h1>
                    <p>{{ ucwords($settings['question_answer']) }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h2 class="h1 fw-bold text-center my-4">Majors</h2>
        <div class="d-flex flex-wrap gap-4 justify-content-center">
     @foreach ($majors as $major)
        <div class="card p-2" style="width: 18rem;">
            <img src="{{ asset('assets/img/majors/' . $major['img_major'] ) }}" class="card-img-top rounded-circle card-image-circle" alt="major">
            <div class="card-body d-flex flex-column gap-1 justify-content-center">
                <h4 class="card-title fw-bold text-center">{{ ucwords($major['name_major']) }}</h4>
                <a href="{{ route('getDoctors',$major['id']) }}" class="btn btn-outline-primary card-button">Browse Doctors</a>
            </div>
        </div>
        @endforeach
    </div>
        <h2 class="h1 fw-bold text-center my-4">Doctors</h2>
        <section class="splide home__slider__doctors mb-5">
            <div class="splide__track ">
                <ul class="splide__list">
                    @foreach ($doctors as $doc)
                    <li class="splide__slide">
                    <div class="card p-2" style="width: 18rem;">
                        <img src="{{ asset('assets/img/doctors/' . $doc['img_doctor']) }}" class="card-img-top rounded-circle card-image-circle"
                            alt="major">
                        <div class="card-body d-flex flex-column gap-1 justify-content-center">
                            <h4 class="card-title fw-bold text-center">{{ ucwords($doc['name_doctor']) }}</h4>
                            @php
                                $majorDoctor = app\Models\Majors::where('id',$doc['major_id'])->first();
                            @endphp
                            <h6 class="card-title fw-bold text-center">{{ ucwords($majorDoctor->name_major) }}</h6>
                            <a href="{{ route('storeAppointment',$doc['id']) }}" class="btn btn-outline-primary card-button">Book an
                                appointment</a>
                        </div>
                    </div>
                </li>
                    @endforeach
            </ul>
        </div>
        </section>
    </div>
    <div class="banner container d-block d-lg-grid d-md-block d-sm-block">
        @foreach ($news as $new)
        <div class="info">
            <div class="info__details" style="height: 25rem;">
                <img src="{{ $new['img_link'] }}" alt="img_link" width="50" height="50">
                <h4 class="title m-0">
                    {{ ucwords($new['title_news']) }}
                </h4>
                <p class="content">
                    {{ ucwords($new['contact_news']) }}
                </p>
                <span class="date"> <i class="far fa-clock mr-1"></i>
                   {{ date('d F-Y',strtotime($new['created_at'])) }}
                </span>
            </div>
        </div>

        @endforeach




        <div class="bottom--left bottom--content bg-blue text-white">
            <h4 class="title">{{ ucwords($settings['footer_app_title']) }}</h4>
            <p>{{ ucwords($settings['footer_app_contact']) }}</p>
            <div class="app-group">
                <div class="app"><img
                        src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/google-play-logo.svg"
                        alt="">Google Play</div>
                <div class="app"><img
                        src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/apple-logo.svg"
                        alt="">App Store</div>
            </div>
        </div>
        <div class="bottom--right bg-blue text-white">
            <img src="{{ asset('assets/img/' . $settings['footer_app_img']) }}" class="img-fluid banner-img">
        </div>
    </div>

@endsection
