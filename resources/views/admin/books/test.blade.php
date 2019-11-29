<form action="{{route('image.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="images" id="images">

    <input type="submit" name="submit" value="UP">
</form>
