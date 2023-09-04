@php use App\Models\Doctor; @endphp
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="post" action="{{route('admin.doctor.update',$doctor->id)}}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control mb-3" value="{{$doctor->name}}">

    <label for="major">Major</label>
    <select name="major_id" id="major" class="form-control mb-3">
        <option value="">Select Major</option>
        @foreach($majors as $major)
            <option value="{{$major->id}}" @if($doctor->major_id == $major->id) selected @endif>{{$major->title}}</option>
        @endforeach
    </select>

    <label for="image">Image</label>
    <input type="file" name="image" id="image" class="form-control mb-3">
    <img src="{{asset(Doctor::IMAGE_PATH.$doctor->image)}}" width="100">

    <button type="submit" class="btn btn-primary">update</button>
</form>
