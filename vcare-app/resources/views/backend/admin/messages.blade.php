@extends('layouts.admin')

@section('title')
    Admin Messages
@endsection


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Messages</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <ages class="breadcrumb-item active">All Messages</ages>
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
                                    <thead class="text-center">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                            <th>User Name</th>
                                            <th>Is Read</th>
                                            <th>Sent At</th>
                                            <th>
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1
                                        @endphp
                                        @foreach ( $messages  as $message )
                                        <tr>
                                            <td>{{ $i++  }}</td>
                                            <td>{{ $message->name }}</td>
                                            <td>{{ $message->phone }}</td>
                                            <td>{{$message->email}}</td>
                                            <td>{{ $message->subject }}</td>
                                            <td>{{ $message->message }}</td>
                                            @php
                                                $user = \App\Models\User::where('id', $message->user_id)->first();
                                            @endphp
                                            <td>{{ $user->name}}</td>
                                            @if ($message->is_readed == 0)
                                            <td class="text-center text-danger">Not Yet</td>
                                            @else
                                            <td class="text-center text-success">Yes</td>
                                            @endif

                                            <td> <span class="date"> <i class="far fa-clock mr-1"></i>
                                                    {{ date('d F Y', strtotime($message->created_at)) }}
                                                </span></td>
                                            <td>
                                                <a href="{{ route('admin.ReadMessages',$message->id) }}"
                                                    title="Read This message"
                                                    class="btn btn-block btn-outline-info">Read</a>
                                                    <form method="POST" action="{{ route('admin.DeleteMessages',$message->id)}}">
                                                        @csrf
                                                        <button  title="Delete This message"
                                                        class="btn btn-block btn-outline-danger">Delete</button>
                                                    </form>
                                            
                                            </td>
                                        </tr>
                                        @endforeach
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
