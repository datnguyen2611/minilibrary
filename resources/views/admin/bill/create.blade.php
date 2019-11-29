@extends('layouts.Admin.main')
@section('content')
    <form method="POST" action="{{route('bill.store')}}">
        @csrf
        @method('POST')
        <div class="form-group">
            <label> name</label>
            <select name="user_id" class="custom-select">
                <option selected> pls select user</option>
                @foreach($users as $user)
                    <option value="{{$user->id}}" name="'user">{{$user->name}}</option>
                @endforeach
            </select>
            <div>{{$errors->first('')}}</div>
        </div>
        <div class="form-group">
            <label>Book :</label>

        @foreach($books as $book)
            <!-- Default unchecked -->
                <label class="checkbox-inline">
                    <input data-name="{{$book->name}}" class="trigger checkbox-books" type="checkbox" value="{{$book->id}}"
                           >{{$book->name}}</label>
            @endforeach
            <div>{{$errors->first('')}}</div>
        </div>
        <div id="wrapped">

        </div>
        <div class="form-group">
            <label for="">borrow day</label>
            <input name="borrow_day" type="date" class="form-control" id=""
            >
            <div>{{$errors->first('borrow_day')}}</div>
        </div>
        <div class="form-group">
            <label for="">refund day</label>
            <input name="refund_day" type="date" class="form-control" id=""
            >
            <div>{{$errors->first('refund_day')}}</div>
        </div>
        <div class="form-group">
            <label for="">status</label>
            <select name="status" class="custom-select">
                <option value="1" name='status'> da tra</option>
                <option selected value="0" name='status'>chua tra</option>
            </select>
            <div>{{$errors->first('borrow_day')}}</div>
        </div>


        <button type="submit" class="btn btn-primary">create</button>
    </form>


@endsection

