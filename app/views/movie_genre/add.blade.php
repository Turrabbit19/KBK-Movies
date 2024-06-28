@extends('layout.main')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-3">
    <div>
        <h1 class="h3 text-gray-800">Movie + Genre</h1>
        <p class="mb-4">
            Luồng phim + thể loại
            <a target="_blank" href="https://datatables.net">KBK Movie</a>.
        </p>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route("post-movGen") }}" method="POST" class="m-3">
            <div class="form-group">
                <label for="text">Tên phim:</label>
                <select class="form-control" id="nameMovie" name="movie_id">
                  @foreach($movies as $movs) 
                    <option value="{{$movs->id}}">{{$movs->name}}</option>
                  @endforeach  
                </select>
              </div>

              <div class="form-group">
                <label for="text">Thể loại phim:</label>
                <select class="form-control" id="nameGenre" name="genre_id">
                  @foreach($genres as $gens) 
                    <option value="{{$gens->id}}">{{$gens->name}}</option>
                  @endforeach  
                </select>
              </div>
            <br>
            <input class="btn btn-outline-success mr-2" type="submit" name="add" value="THÊM">

            <a href="{{route("list-movGen")}}"><button type="button" class="btn btn-info">Danh sách</button></a>
        </form>
    </div>
</div>

@endsection