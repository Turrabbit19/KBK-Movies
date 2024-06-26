@extends('layout.main')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route("edit-movie/" .$movie->id) }}" method="POST" class="m-3" enctype="multipart/form-data">
               
                <div class="form-group">
                    <label for="name">Tên Phim:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$movie->name}}">
                </div>

                <div class="form-group">
                    <label for="name">Poster:</label>
                    <img src="{{BASE_URL_IMG . $movie->poster}}" alt="$movie->poster" class="w-25">
                    <input type="file" class="form-control-file" id="poster" name="poster">
                </div>

                <div class="form-group">
                    <label for="name">Ảnh diễn viên:</label>
                    <img src="{{BASE_URL_IMG . $movie->avatar}}" alt="$movie->avatar" class="w-25">
                    <input type="file" class="form-control-file" id="avatar" name="avatar">
                </div>

                <div class="form-group">
                    <label for="text">Đạo diễn:</label>
                    <input type="text" class="form-control-file" id="director" name="director" value="{{$movie->director}}">
                </div>

                <div class="form-group">
                    <label for="text">Thời lượng phim:</label>
                    <input type="text" class="form-control" id="duration" name="duration" value="{{$movie->duration}}">
                </div>

                <div class="form-group">
                    <label for="date">Ngày phát hành:</label>
                    <input type="date" class="form-control-file" id="release_date" name="release_date">
                    <p>  {{$movie->release_date}}</p>
                </div>

                <div class="form-group">
                    <label for="text">Mô tả:</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{$movie->description}}">
                </div>

                <div class="form-group">
                    <label for="text">Trailer Video:</label>
                    <input type="text" class="form-control" id="trailer_url" name="trailer_url" value="{{$movie->trailer_url}}">
                </div>
                <br>
                <input class="btn btn-outline-success mr-2" type="submit" name="edit" value="SỬA">

                <a href="{{route("list-movie")}}"><button type="button" class="btn btn-info">Danh sách</button></a>
            </form>
        </div>
    </div>

@endsection