@extends('layouts.admin')

@section('title')
    Admin Edit News
@endsection


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= strtoupper('edit news') ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.AllNews') }}">All News</a></li>
                        <ages class="breadcrumb-item active">Edit News</ages>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        @if (Session::has('success'))
        <div class="alert alert-success col-12">{{ Session('success') }}</div>
        @endif
        <form role="form" method="POST" action="{{ route('admin.StoreEditNews') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="img_link">Image Link</label>
                    <input type="text" class="form-control" id="img_link" placeholder="Enter Doctor Name"
                        name="img_link" value="<?= $news["img_link"] ?>">
                        <input type="text" style="display:none" class="form-control" id="id" placeholder="Enter Doctor Name"
                        name="id" value="<?= $news["id"] ?>">
                </div>
                <div class="form-group">
                    <label for="title_news">Title News</label>
                    <input type="text" class="form-control" id="title_news" placeholder="Enter Doctor Name"
                        name="title_news" value="<?= $news["title_news"] ?>">
                </div>

                <div class="form-group">
                    <label for="contact_news">Contact News</label>
                    <input type="text" class="form-control" id="contact_news" placeholder="Enter Doctor Name"
                        name="contact_news" value="<?= $news["contact_news"] ?>">
                </div>

                <div class="form-group">
                    <label for="contact_news">Contact News</label>
                    <input type="text" class="form-control" id="contact_news" placeholder="Enter Doctor Name"
                        name="contact_news" value="<?= $news["contact_news"] ?>">
                </div>
                <div class="form-group">
                    <label>Select Publish</label>
                    <select class="form-control" name="published">
                        <?php if ($news['published'] == 0): ?>
                            <option value="0" selected >no</option>
                            <option value="1" >yes</option>
                        <?php else: ?>
                            <option value="1" selected >Yes</option>
                            <option value="0" >no</option>
                        <?php endif; ?>
                    </select>
                </div>


            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.content -->
</div>
@endsection
