@extends('layout.main')

@section('content')

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route("post-room") }}" method="POST" class="m-3">
            <div class="form-group">
                <label for="room_number">Phòng:</label>
                <input type="number" class="form-control" id="room_number" name="room_number">
            </div>
            <div class="form-group">
                <label for="number_seats">Số ghế:</label>
                <input type="number" class="form-control" id="number_seats" name="number_seats">
            </div>
            <div class="form-group">
                <label for="seating_layout">Bố cục ghế ngồi:</label>
                <input type="text" class="form-control" id="seating_layout" name="seating_layout">
            </div>


            <br>
            <input class="btn btn-outline-success mr-2" type="submit" name="add" value="THÊM">

            <a href="{{route("list-room")}}"><button type="button" class="btn btn-info">Danh sách</button></a>
        </form>
    </div>
</div>

@endsection