@extends('layouts.frontend')
@section('title')
Login
@endsection
@section('content')
    <div class="page-wrapper">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Login</li>
                </ol>
            </nav>

            <div class="d-flex flex-column gap-3 account-form  mx-auto mt-5">
                @error('errors')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <form class="form" method="POST" action="{{ route('checkUser') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label required-label" for="email">Email</label>
                        <input type="email" class="form-control mb-3" id="email" name="email" >
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label required-label" for="password">Password</label>
                        <input type="password" class="form-control mb-3" id="password" name="password" >
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                <div class="d-flex justify-content-center gap-2 flex-column flex-lg-row flex-md-row flex-sm-column">
                    <span>don't have an account?</span><a class="link" href="{{ route('indexRegister') }}">create account</a>
                </div>

            </div>

        </div>
    </div>
@endsection

