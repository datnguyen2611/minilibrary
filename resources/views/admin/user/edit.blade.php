@extends('layouts.Admin.main')
@section('content')
    <form method="post" action="{{route('users.update',$user->id)}}">
        <div class="form-group">
            @csrf
            @method('PUT')

            <label for="exampleInputEmail1">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   value="{{{$user->email}}}">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputName">Name</label>
            <input name="name" type="text" class="form-control" id="exampleInputPassword1" value="{{$user->name}}">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                   value="{{$user->password}}">
        </div>
        <div class="form-group">
            <label for="exampleInputAge">Age</label>
            <input name="age" type="text" class="form-control" id="exampleInputAge" value="{{$user->age}}">
        </div>
        <div class="form-group">
            <label for="exampleInputAddress">Address</label>
            <input name="address" type="text" class="form-control" id="exampleInputAddress" value="{{$user->address}}">
        </div>
        <div class="form-group">
            <label for="exampleInputPhone">Phone Number</label>
            <input name="phone" type="text" class="form-control" id="exampleInputPhoneNumber"
                   value="{{$user->phone_number}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
