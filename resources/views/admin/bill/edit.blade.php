@extends('layouts.Admin.main')
@section('content')
    <form method="POST" action="{{route('bill.update',$bill->id)}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label> name</label>
            <select name="user_id" class="custom-select">
                @foreach($users as $user)
                    <option @if($user->id == $bill->user_id) @endif value="{{$user->id}}" name="'user">{{$user->name}}</option>
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
                   @if(in_array($book->id,$selectedBookIds)) checked @endif
                    >{{$book->name}}</label>
        @endforeach
        <div>{{$errors->first('')}}</div>
        </div>
        <div id="wrapped">
            @foreach($bill->details as $key=>$detail)
                <label>{{$books->firstWhere('id','=',$detail->book_id)->name}}</label>
                <input type="text" name="books[{{$key}}][book_id]" value="{{$detail->book_id}}" hidden="">
                <input type="text" name="books[{{$key}}][quantity]" placeholder="Quantity" value="{{$detail->quantity}}">
                <br>
            @endforeach
        </div>
        <div class="form-group">
            <label for="">borrow day</label>
            <input name="borrow_day" type="date" class="form-control" id=""
                   value="{{$bill->borrow_day}}"
            >
            <div>{{$errors->first('borrow_day')}}</div>
        </div>
        <div class="form-group">
            <label for="">refund day</label>
            <input name="refund_day" type="date" class="form-control" id=""
                   value="{{$bill->refund_day}}"
            >
            <div>{{$errors->first('refund_day')}}</div>
        </div>
        <div class="form-group">
            <label for="">status</label>
            <select name="status" class="custom-select">
                <option @if($bill->status == 1) selected @endif value="1" name='status'> da tra</option>
                <option @if($bill->status == 0) selected @endif value="0" name='status'>chua tra</option>
            </select>
            <div>{{$errors->first('borrow_day')}}</div>
        </div>


        <button type="submit" class="btn btn-primary">create</button>
    </form>

@endsection
