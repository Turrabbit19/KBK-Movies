@extends('layout.main')

@section('content')

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route("edit-showtime/" . $detailST->id) }}" method="POST" class="m-3">
       
            <div class="form-group">
                <label for="room_id">Phòng:</label>
                <select name="room_id" id="room_id" class="form-control">
                    <option value="">Mời chọn</option>
                    @foreach ($rOm as $rom)
                        <option value="{{ $rom->id }}" {{ $rom->id == $detailST->room_id ? 'selected' : '' }}>{{ $rom->room_number }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="movie_id">Phim:</label>
                <select name="movie_id" id="movie_id" class="form-control">
                    <option value="">Mời chọn</option>
                    @foreach ($movs as $mov)
                        <option value="{{ $mov->id }}" {{ $mov->id == $detailST->movie_id ? 'selected' : '' }}>{{ $mov->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="show_date">Ngày chiếu:</label>
                <input type="date" class="form-control" id="show_date" name="show_date" value="{{$detailST->show_date}}">
            </div>
            <div class="form-group">
                <label for="show_time">Giờ chiếu:</label>
                <input type="text" class="form-control" id="show_time" name="show_time" value="{{$detailST->show_time}}">
            </div>
            <br>
            <input class="btn btn-outline-warning mr-2" type="submit" name="edit" value="SỬA">

            <a href="{{route("list-showtime")}}"><button type="button" class="btn btn-info">Danh sách</button></a>
        </form>
    </div>
</div>

@endsection