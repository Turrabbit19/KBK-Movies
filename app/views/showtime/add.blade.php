@extends('layout.main')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('post-showtime') }}" method="POST" class="m-3">
                <div class="form-group">
                    <label for="room_id">Phòng:</label>
                    <select class="form-control" name="room_id" id="">
                        <option value="">Select...</option>
                        @foreach ($room as $index => $rom)
                            <option value="{{ $rom->id }}">{{ $rom->room_number }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="movie_id">Phim:</label>
                    <select class="form-control" name="movie_id" id="">
                        <option value="">Select...</option>
                        @foreach ($movie as $index => $mov)
                            <option value="{{ $mov->id }}">{{ $mov->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="show_date">Ngày chiếu:</label>
                    <input type="date" class="form-control" id="show_date" name="show_date">
                </div>
                <div class="form-group">
                    <label for="show_time">Giờ chiếu:</label>
                    <input type="time" class="form-control" id="show_time" name="show_time">
                </div>
                
                <input class="btn btn-outline-success mr-2" type="submit" name="add" value="THÊM">

                <a href="{{ route('list-showtime') }}"><button type="button" class="btn btn-info">Danh sách</button></a>
            </form>
        </div>
    </div>
@endsection
