@extends('layout.main')

@section('content')

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route("edit-seat-type/" . $seatTypes->id) }}" method="POST" class="m-3">
            <div class="form-group">
                <label for="type_name">Tên loại ghế:</label>
                <input type="text" class="form-control" id="type_name" name="type_name" value="{{$seatTypes->type_name}}">
            </div>
            <div class="form-group">
                <label for="price">Giá:</label>
                <input type="number" class="form-control" id="price" name="price" value="{{$seatTypes->price}}">
            </div>

            <br>
            <input class="btn btn-outline-warning mr-2" type="submit" name="edit" value="SỬA">

            <a href="{{route("list-seat-type")}}"><button type="button" class="btn btn-info">Danh sách</button></a>
        </form>
    </div>
</div>

@endsection