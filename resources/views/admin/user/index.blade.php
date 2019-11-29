@extends('layouts.Admin.main')
@section('content')
    <table class="table">
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Phone</th>
            <th>Adress</th>
            <th>Email</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->age}}</td>
                <td>{{$user->phone_number}}</td>
                <td>{{$user->address}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <a class="btn btn-info"
                       href="{{route('users.edit',$user->id)}}">edit</a>
                </td>
                <td>

                    <form action="{{route('users.destroy',$user->id)}}" method="POST" id="deleteForm">
                        @csrf
                        @method('DELETE')
                        <input onsubmit="return confirm('Are you sure you want to submit?');"
                            class="btn btn-warning" type="submit" name="submit" value="delete"

                        </input>
                    </form>

                </td>
            </tr>
        @endforeach

    </table>
@endsection
