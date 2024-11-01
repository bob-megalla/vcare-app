@extends('layouts.admin')

@section('title')
    Doctor Read Booked
@endsection


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= strtoupper('admin Doctor Read Booked') ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.AllBooked') }}">All Booked</a></li>
                        <ages class="breadcrumb-item active">Booked</ages>
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
                                <span class="username"><a
                                        href="#"><?= strtoupper($selectedBooked['name']) ?></a></span>
                                <span class="description">Time : <i class="far fa-clock mr-1"></i>
                                    <?= date('d F Y', strtotime($selectedBooked['created_at'])) ?>
                                </span>

                            </div>

                            <!-- /.user-block -->
                            <div class="card-tools">
                                <button type="button"
                                    class="btn btn-tool <?php if ($selectedBooked["is_compeleted"] == "yes")
                                        echo "text-danger" ?? "" ?>"
                                        data-toggle="tooltip" title="IF READ IT MEANS ALREADY COMPLETED">
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
                                <p>Patient Name : {{ strtoupper($selectedBooked['name']) }}</p>
                            <p>Patient Phone : {{ $selectedBooked['phone'] }}</p>
                            <p>Patient Email : {{ $selectedBooked['email'] }}</p>
                                <p>Booked At: {{ date('d F-Y', strtotime($selectedBooked->created_at)) }}</p>
                            {{-- <span > <a href="?admin=getBookedComplete&id=<?=$selectedBooked['id']?>" title="Edit This doctor"
                            class="btn btn-block btn-outline-info">Complete</a></span> --}}

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
