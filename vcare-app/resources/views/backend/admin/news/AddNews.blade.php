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
                    <h1 class="m-0 text-dark"><?= strtoupper('add news') ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= '?admin=dashboard' ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= '?admin=allNews' ?>">All News</a></li>
                        <ages class="breadcrumb-item active">Add a New New</ages>
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
        <form role="form" method="POST" action="{{ route('admin.StoreAddNews') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="img_link">Image Link <a  target="_blank" href="https://www.svgrepo.com/collection/hospital-medical-duotone-vectors/"> get links Image</a></label>
                    <input type="text" class="form-control" id="img_link" placeholder="Enter Image Link"
                        name="img_link">
                </div>
                @if (Session::has('img_link'))
                <div class="alert alert-danger col-12">{{ Session('img_link')[0] }}</div>
                @endif
                <div class="form-group">
                    <label for="title_news">Title News</label>
                    <input type="text" class="form-control" id="title_news" placeholder="Enter title_news"
                        name="title_news">
                </div>
                @if (Session::has('title_news'))
                <div class="alert alert-danger col-12">{{ Session('title_news')[0] }}</div>
                @endif
                <div class="form-group">
                    <label for="contact_news">Contact News</label>
                    <input type="text" class="form-control" id="contact_news" placeholder="Enter contact_news"
                        name="contact_news">
                </div>
                @if (Session::has('contact_news'))
                <div class="alert alert-danger col-12">{{ Session('contact_news')[0] }}</div>
                @endif
                <div class="form-group">
                    <label>Is Publish</label>
                    <select class="form-control" name="published">
                      <option value="1">Yes</option>
                      <option value="0">No</option>
                    </select>
                  </div>
                  @if (Session::has('published'))
                  <div class="alert alert-danger col-12">{{ Session('published')[0] }}</div>
                  @endif



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
