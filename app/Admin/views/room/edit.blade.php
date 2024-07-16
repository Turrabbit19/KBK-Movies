@extends('layout.main')

@section('content')

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route("admin/edit-room/" . $roms->id) }}" method="POST" class="m-3">
            <div class="form-group">
                <label for="room_number">Phòng:</label>
                <input type="number" class="form-control" id="room_number" name="room_number" value="{{$roms->room_number}}">
            </div>
            <div class="form-group">
                <label for="number_seats">Số ghế:</label>
                <input type="number" class="form-control" id="number_seats" name="number_seats" value="{{$roms->number_seats}}">
            </div>
            <div class="form-group">
                <label for="seating_layout">Bố cục ghế ngồi:</label>
                <input type="text" class="form-control" id="seating_layout" name="seating_layout" value="{{$roms->seating_layout}}">
            </div>

            <br>
            <input class="btn btn-outline-warning mr-2" type="submit" name="edit" value="SỬA">

            <a href="{{route("admin/list-room")}}"><button type="button" class="btn btn-info">Danh sách</button></a>
        </form>
    </div>
</div>

@endsection