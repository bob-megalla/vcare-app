@extends('layouts.admin')

@section('title')
    Admin Read Messages
@endsection


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Admin Read Messages</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.AllMessages') }}">All Messages</a></li>
                        <ages class="breadcrumb-item active">Message</ages>
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
                    <div class="card card-widget">
                        <div class="card-header">
                            <div class="user-block">
                                <span class="username"><a href="#"><?= strtoupper($messages['name'])?></a></span>
                                <span class="description">Subject: <?= $messages["subject"] ?> - <i class="far fa-clock mr-1"></i>
                                                    <?= date('d F Y', strtotime($messages['created_at'])) ?>
                                                </span>
                            </div>
                            <!-- /.user-block -->
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool <?php if($messages["is_readed"]== "1") echo "text-danger" ?? "" ?>" data-toggle="tooltip" title="IF READ IT MEANS ALREADY READ">
                                    <i class="far fa-circle"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                        class="fas fa-times"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- post text -->
                            <p>Sender Name : <?= strtoupper($messages['name'])?></p>
                            <p>Sender Phone : <?= $messages['phone']?></p>
                            <p>Sender Email : <?= $messages['email']?></p>
                            <p>Subject Body: <?= $messages['subject']?></p>
                            <p>Message Body : <?= $messages['message']?></p>
                        </div>

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
