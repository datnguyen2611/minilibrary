@extends('layouts.Admin.main')
@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <table>
        <tr>
            <th>Name</th>
            <th>Category</th>
        </tr>
        @foreach($categories as $category)
            <tr>
                <td>
                    {{$category -> name}}
                </td>
                <td>
                    {{strtoupper($category -> category_code)}}
                </td>
                <td>
                    <a class="btn btn-info"
                       href="{{route('category.edit',$category->id)}}">edit</a>
                </td>
                <td>

                    <form action="{{route('category.destroy',$category->id)}}" method="POST" id="deleteForm"
                          onSubmit="alert('Are you sure you wish to delete?');">
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
    <a class="btn btn-info text-center w-100"
       href="{{route('category.create')}}">create</a>
@endsection

