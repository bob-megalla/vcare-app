@extends('layouts.admin')

@section('title')
    Admin Settings
@endsection


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"><?= strtoupper('settings') ?></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= '?admin=dashboard' ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">All Settings</li>
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
                        <!-- Main content -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Settings</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <form method="POST" Action="{{ route('admin.StoreSettings') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label for="site_name">site_name</label>
                                            <input type="text" class="form-control" id="site_name" name="site_name"
                                                value="{{ $settings->site_name }}" placeholder="Enter Site Name">
                                            <input type="text" class="form-control" style="display:none" name="id"
                                                value="{{ $settings->id }}">
                                        </div>
                                        @if (Session::has('site_name'))
                                            <div class="alert alert-danger col-12">{{ Session('site_name')[0] }}</div>
                                        @endif
                                        <div class="form-group col-12">
                                            <div class="col-12">
                                                <label class="custom-file-label" for="question_img">Choose
                                                    file</label>
                                                <input type="file" class="custom-file-input" id="question_img"
                                                    name="question_img" value="" placeholder="Enter question_img">
                                            </div>
                                            <div class="col-3"> <img
                                                    src="{{ asset('assets/img/' . $settings->question_img) }}"
                                                    class="card-img-top card-image-circle" width="50px" height="50px"
                                                    alt="question_img"></div>

                                        </div>
                                        @if (Session::has('question_img'))
                                        <div class="alert alert-danger col-12">{{ Session('question_img')[0] }}</div>
                                        @endif
                                        <div class="form-group col-12">
                                            <label for="question_home">Question Home</label>
                                            <input type="text" class="form-control" id="question_home"
                                                name="question_home" value="{{ $settings['question_home'] }}"
                                                placeholder="Enter Question Home">
                                        </div>
                                        @if (Session::has('question_home'))
                                        <div class="alert alert-danger col-12">{{ Session('question_home')[0] }}</div>
                                        @endif
                                        <div class="form-group col-12">
                                            <label for="question_answer">Question Answer</label>
                                            <textarea class="form-control" id="question_answer" name="question_answer" rows="3"
                                                placeholder="Enter Question Answer">{{ $settings['question_answer'] }}</textarea>
                                        </div>
                                        @if (Session::has('question_anser'))
                                        <div class="alert alert-danger col-12">{{ Session('question_anser')[0] }}</div>
                                        @endif
                                        <div class="form-group col-12">
                                            <label for="footer_title">Footer Title</label>
                                            <input type="text" class="form-control" id="footer_title" name="footer_title"
                                                value="{{ $settings['footer_title'] }}" placeholder="Enter Footer Title">
                                        </div>
                                        @if (Session::has('footer_title'))
                                        <div class="alert alert-danger col-12">{{ Session('footer_title')[0] }}</div>
                                        @endif
                                        <div class="form-group col-12">
                                            <label for="footer_contact">Footer Content</label>
                                            <textarea class="form-control" id="footer_contact" name="footer_contact" rows="3"
                                                placeholder="Enter Footer Content">{{ $settings['footer_contact'] }}</textarea>
                                        </div>
                                        @if (Session::has('footer_contact'))
                                        <div class="alert alert-danger col-12">{{ Session('footer_contact')[0] }}</div>
                                        @endif

                                        <div class="form-group col-12">
                                            <label for="footer_app_title">Footer App Title</label>
                                            <input type="text" class="form-control" id="footer_app_title"
                                                name="footer_app_title" value="{{ $settings['footer_app_title'] }}"
                                                placeholder="Enter Footer App Title">
                                        </div>
                                        @if (Session::has('footer_app_title'))
                                        <div class="alert alert-danger col-12">{{ Session('footer_app_title')[0] }}</div>
                                        @endif
                                        <div class="form-group col-12">
                                            <label for="footer_app_contact">Footer App Contact</label>
                                            <input type="text" class="form-control" id="footer_app_contact"
                                                name="footer_app_contact" value="{{ $settings['footer_app_contact'] }}"
                                                placeholder="Enter Footer App Contact">
                                        </div>
                                        @if (Session::has('footer_app_contact'))
                                        <div class="alert alert-danger col-12">{{ Session('footer_app_contact')[0] }}</div>
                                        @endif
                                        <div class="form-group col-12">
                                            <div class="col-12">
                                                <label class="custom-file-label" for="footer_app_img">Choose
                                                    file</label>
                                                <input type="file" class="custom-file-input" id="footer_app_img"
                                                    name="footer_app_img" value="{{ $settings->footer_app_img }}"
                                                    placeholder="Enter footer_app_img">
                                            </div>
                                            <div class="col-3"> <img
                                                    src="{{ asset('assets/img/' . $settings->footer_app_img) }}"
                                                    class="card-img-top card-image-circle" width="50px" height="50px"
                                                    alt="footer_app_img"></div>

                                        </div>
                                        @if (Session::has('footer_app_img'))
                                        <div class="alert alert-danger col-12">{{ Session('footer_app_img')[0] }}</div>
                                        @endif



                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-info">Submit</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->


        <!-- END -->
    </div>
@endsection
