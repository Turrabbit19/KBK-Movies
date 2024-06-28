@extends('layout.main')

@section('content')

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route("post-seat-type") }}" method="POST" class="m-3">
            <div class="form-group">
                <label for="type_name">Tên loại ghế:</label>
                <input type="text" class="form-control" id="type_name" name="type_name">
            </div>
            <div class="form-group">
                <label for="price">Giá:</label>
                <input type="number" class="form-control" id="price" name="price">
            </div>

            <br>
            <input class="btn btn-outline-success mr-2" type="submit" name="add" value="THÊM">

            <a href="{{route("list-seat-type")}}"><button type="button" class="btn btn-info">Danh sách</button></a>
        </form>
    </div>
</div>

@endsection