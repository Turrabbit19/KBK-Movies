@extends('layout.main')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-3">
    <div>
        <h1 class="h3 text-gray-800">Photos</h1>
        <p class="mb-4">
            Ảnh của phim
            <a target="_blank" href="https://datatables.net">KBK Movie</a>.
        </p>
    </div>
</div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route("admin/post-photo") }}" method="POST" class="m-3" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="file">Ảnh phim:</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
                <div class="form-group">
                    <label for="name">Alt:</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="text">Tên phim:</label>
                    <select class="form-control" id="nameMovie" name="movie_id">
                      @foreach($movies as $movs) 
                        <option value="{{$movs->id}}">{{$movs->name}}</option>
                      @endforeach  
                    </select>
                  </div>

                <br>
                <input class="btn btn-outline-success mr-2" type="submit" name="add" value="THÊM">

                <a href="{{route("admin/list-photo")}}"><button type="button" class="btn btn-info">Danh sách</button></a>
            </form>
        </div>
    </div>

@endsection