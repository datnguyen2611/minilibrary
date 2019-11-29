@extends('layouts.Admin.main')
@section('content')
    <form method="POST" action="{{route('books.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputName">Name</label>
            <input name="name" type="text" class="form-control" id="exampleInputPassword1">
            <div>{{$errors->first('name')}}</div>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Images</label>
            <input type="file" name="images">
            <div>{{$errors->first('images')}}</div>
        </div>
        <div class="form-group">
            <label for="exampleInputAge">discriptions</label>
            <input name="discriptions" type="text" class="form-control" id="exampleInputAge">
            <div>{{$errors->first('discriptions')}}</div>
        </div>
        <div class="form-group">
            <label for="exampleInputAddress">excerpts</label>
            <input name="excerpts" type="text" class="form-control" id="exampleInputAddress">
            <div>{{$errors->first('excerpts')}}</div>
        </div>
        <div class="form-group">
            <label for="exampleInputPhone">pubic_years</label>
            <input name="pubic_years" type="text" class="form-control" id="exampleInputPhoneNumber"
            >
            <div>{{$errors->first('pubic_years')}}</div>
        </div>
        <div class="form-group">
            <label for="exampleInputPhone">status</label>
            <input name="status" type="text" class="form-control" id="exampleInputPhoneNumber"
            >
            <div>{{$errors->first('status')}}</div>
        </div>

        <div class="form-group">
        @foreach($categories as $category)
            <!-- Default unchecked -->
                <label class="checkbox-inline"><input type="checkbox" value="{{$category->id}}" name="categories[]">{{$category->name}}</label>
            @endforeach
        </div>

        </div>

        <button type="submit" class="btn btn-primary">create</button>
    </form>
@endsection
