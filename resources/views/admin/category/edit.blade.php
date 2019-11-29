@extends('layouts.Admin.main')
@section('content')
    <form method="post" action="{{route('category.update',$category->id)}}" >
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   value="{{{$category->name}}}">
        </div>
        <div class="form-group">
            <label for="">ID</label>
            <input name="category_code" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   value="{{{$category->category_code}}}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
