{{--@extends('Admin.inc.master')--}}

{{--@section('content')--}}
{{--    <div class="content-wrapper">--}}
{{--        <!-- Content Header (Page header) -->--}}
{{--        <div class="content-header">--}}
{{--            <div class="container-fluid">--}}
{{--                <div class="row mb-2">--}}
{{--                    <div class="col-sm-6">--}}
{{--                        <h1 class="m-0">Add new Doctor</h1>--}}
{{--                    </div><!-- /.col -->--}}
{{--                </div><!-- /.row -->--}}
{{--            </div><!-- /.container-fluid -->--}}
{{--        </div>--}}
{{--        <!-- /.content-header -->--}}

{{--        <!-- Main content -->--}}
{{--        <section class="content">--}}
{{--            <div class="container-fluid">--}}
{{--                @if ($errors->any())--}}
{{--                    <div class="alert alert-danger">--}}
{{--                        <ul>--}}
{{--                            @foreach ($errors->all() as $error)--}}
{{--                                <li>{{ $error }}</li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            </div><!-- /.container-fluid -->--}}
{{--            <form method="post" action="{{route('admin.doctor.store')}}">--}}
{{--                @csrf--}}
{{--                <label for="name">Name</label>--}}
{{--                <input type="text" name="name" id="name" class="form-control mb-3">--}}

{{--                <label for="major">Major</label>--}}
{{--                <select name="major" id="major" class="form-control mb-3">--}}
{{--                    <option value="">Select Major</option>--}}
{{--                    @foreach($majors as $major)--}}
{{--                        <option value="{{$major->id}}">{{$major->title}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}

{{--                <label for="image">Image</label>--}}
{{--                <input type="file" name="image" id="image" class="form-control mb-3">--}}

{{--                <button type="submit" class="btn btn-primary">Add</button>--}}
{{--            </form>--}}

{{--        </section>--}}
{{--        <!-- /.content -->--}}
{{--    </div>--}}
{{--@endsection--}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="post" action="{{route('admin.doctor.store')}}" enctype="multipart/form-data">
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control mb-3">

    <label for="major">Major</label>
    <select name="major_id" id="major" class="form-control mb-3">
        <option value="">Select Major</option>
        @foreach($majors as $major)
            <option value="{{$major->id}}">{{$major->title}}</option>
        @endforeach
    </select>

    <label for="image">Image</label>
    <input type="file" name="image" id="image" class="form-control mb-3">

    <button type="submit" class="btn btn-primary">Add</button>
</form>
