@extends('layouts.Admin.main')
@section('content')
    <form method="post" action="{{route('books.update',$books->id)}}" enctype="multipart/form-data">
        <div class="form-group">
            @csrf
            @method('PUT')
            <label for="exampleInputEmail1">Name</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   value="{{{$books->name}}}">
        </div>
        <img src="{{url('/images/'.$books->images)}}" alt="" width="200px" height="200px">
        <div class="form-group">
            <label for="exampleInputName">images</label>
            <input name="images" type="file" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">discriptions</label>
            <input name="discriptions" type="text" class="form-control" id="exampleInputPassword1"
                   value="{{$books->discriptions}}">
        </div>
        <div class="form-group">
            <label for="exampleInputAge">excerpts</label>
            <input name="excerpts" type="text" class="form-control" id="exampleInputAge" value="{{$books->excerpts}}">
        </div>
        <div class="form-group">
            <label for="exampleInputAddress">pubic years</label>
            <input name="pubic_years" type="text" class="form-control" id="exampleInputAddress"
                   value="{{$books->status}}">
        </div>
        <div class="form-group">
            <label>status</label>
            <input name="status" type="text" class="form-control" id="exampleInputPhoneNumber"
                   value="{{$books->status}}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
