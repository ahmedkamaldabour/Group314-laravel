@extends('Admin.inc.master')



@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">All Doctors</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                @if(session()->has('success'))
                    <div class="alert alert-success mt-3">
                        {{session()->get('success')}}
                    </div>
                @endif

                <div class="row mb-3">
                    <div class="col-sm-12">
                        <a href="{{route('admin.doctor.create')}}" class="btn btn-success">Add New Doctor</a>
                    </div>
                </div>


                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Major</th>
                        <th style="width: 40px">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($doctors as $doctor)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <img src="{{asset('uploads/doctors/'.$doctor->image)}}" alt="{{$doctor->name}}"
                                     width="100">
                            </td>
                            <td>{{$doctor->name}}</td>
                            <td>{{$doctor->major->title}}</td>
                            <td>
                                <a href="{{ route( 'admin.doctor.edit',$doctor) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route( 'admin.doctor.destroy',$doctor) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$doctors->links()}}
            </div><!-- /.container-fluid -->
            {{--            {{$doctors->links()}}--}}

        </section>
        <!-- /.content -->
    </div>
@endsection
