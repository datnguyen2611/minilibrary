@extends('layouts.Admin.main')
@section('content')
    @if(Session::has('success'))
        <p class="alert alert-success">{{ Session::get('success') }}</p>
    @endif
    <table class="table">
        <tr>
            <th>Name</th>
            <th>images</th>
            <th>discriptions</th>
            <th>excerpts</th>
            <th>pubic_years</th>
            <th>status</th>
            <th>Category</th>
        </tr>
        @foreach($books as $book)
            <tr>
                <td>{{$book->name}}</td>
                <td>
                    <img src="{{url('/images/'.$book->images)}}" alt=""
                         width="200px" height="200px">
                </td>
                <td>{{$book->discriptions}}</td>
                <td>{{$book->excerpts}}</td>
                <td>{{$book->pubic_years}}</td>
                <td>{{$book->status}}</td>
                <td>
                    <p>
                @foreach($book->categories as $getCategory)
                    {{$getCategory->name}},
                    @endforeach
                    </p>
                </td>
                <td>
                    <a class="btn btn-info"
                       href="{{route('books.edit',$book->id)}}">edit</a>
                </td>
                <td>

                    <form action="{{route('books.destroy',$book->id)}}" method="POST" id="deleteForm">
                        @csrf
                        @method('DELETE')
                        <input onsubmit="return confirm('Are you sure you want to submit?');"
                               class="btn btn-warning" type="submit" name="submit" value="delete"
                        >

                        </input>
                    </form>

                </td>
            </tr>
        @endforeach
    </table>
    {{$books->links()}}
    <a class="btn btn-info text-center w-100"
       href="{{route('books.create')}}">create</a>
@endsection
