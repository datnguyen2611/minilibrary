@extends('layouts.Admin.main')
@section('content')
    @if(Session::has('success'))
        <p class="alert alert-success">{{ Session::get('success') }}</p>
    @endif
    <table>
        <tr>
            <th>user</th>
            <th>books name</th>
            <th>day borrow</th>
            <th>day return</th>
            <th> status</th>
        </tr>

        @foreach($bills as $bill)
            <tr>
                <td>{{$bill->user->name}}</td>
                <td>
                    @foreach($bill->details as $detail)
                        <p>{{$detail->book->name}}: {{$detail->quantity}}</p>
                    @endforeach
                </td>
                <td>{{$bill->borrow_day}}</td>
                <td>{{$bill->refund_day}}</td>
                <td>{{$bill->status ? 'Đã trả' : 'Chưa trả'}}</td>
                <td><a class="btn btn-info"
                       href="{{route('bill.edit',$bill->id)}}">edit</a></td>
                <td>
                    <form action="{{route('bill.destroy',$bill->id)}}" method="POST" id="deleteForm">
                        @csrf
                        @method('DELETE')
                        <input onsubmit="return confirm('Are you sure you want to submit?');"
                               class="btn btn-warning" type="submit" name="submit" value="delete"
                        >
                    </form>
                </td>
            </tr>

        @endforeach


    </table>

    <a class="btn btn-info text-center w-100"
       href="{{route('bill.create')}}">create</a>

@endsection
