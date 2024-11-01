@extends('layouts.admin')

@section('title')
    Admin News
@endsection


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= strtoupper('news') ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">All News</li>
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
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Img Link</th>
                                        <th>Title News</th>
                                        <th>Content News</th>
                                        <th>Published</th>
                                        <th>Created At</th>
                                        <th>
                                            <a href="{{ route('admin.AddNews') }}" title="Add A New News"
                                                class="btn btn-block btn-outline-success">Add</a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($news as $news): ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $news['img_link'] ?></td>
                                            <td><?= $news['title_news'] ?>
                                            <td><?= $news['contact_news'] ?>
                                            <?php if($news['published']==0):?>
                                            <td class="text-center text-danger">Not Published</td>
                                            <?php else:?>
                                            <td class="text-center text-success">Yes</td>
                                            <?php endif;?>
                                            </td>
                                            <td> <span class="date"> <i class="far fa-clock mr-1"></i>
                                                    <?= date('d F Y', strtotime($news['created_at'])) ?>
                                                </span></td>
                                            <td>
                                                <a href="{{ route('admin.EditNews',$news['id'] ) }}"
                                                    title="Edit This news"
                                                    class="btn btn-block btn-outline-info">Edit</a>
                                                    <form method="POST" action="{{ route('admin.DeleteNews',$news->id)}}">
                                                        @csrf
                                                        <button title="Delete This news"
                                                        class="btn btn-block btn-outline-danger">Delete</button>
                                                    </form>


                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
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
