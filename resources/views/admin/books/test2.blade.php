<table>
    <tr>
        <th>
            Name
        </th>
    </tr>
    @foreach($books as $book)
        <tr>
            <td>{{$book->name}}</td>
            <td><img src="{{url('/images/'.$book->images)}}" alt=""
                width="200px" height="200px">
            </td>
        </tr>
    @endforeach

</table>
