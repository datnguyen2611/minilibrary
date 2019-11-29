@extends('layouts.Admin.main')
@section('content')
    <form method="POST" action="{{route('category.store')}}">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="exampleInputName">Name</label>
            <input name="name" type="text" class="form-control"  >
            <div>{{$errors->first('name')}}</div>
        </div>
        <div class="form-group">
            <label for="exampleInputName"></label>
            <input name="category_code" type="text" class="form-control"  >
            <div>{{$errors->first('category_code')}}</div>
        </div>

        <button type="submit" class="btn btn-primary">create</button>
    </form>
@endsection
