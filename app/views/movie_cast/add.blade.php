@extends('layout.main')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-3">
    <div>
      <h1 class="h3 text-gray-800">Movie + Cast</h1>
      <p class="mb-4">
          Luồng phim + diễn viên
          <a target="_blank" href="https://datatables.net">KBK Movie</a>.
      </p>
  </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route("post-movCas") }}" method="POST" class="m-3">
            <div class="form-group">
                <label for="text">Tên phim:</label>
                <select class="form-control" id="nameMovie" name="movie_id">
                  <option value="">Select...</option>
                  @foreach($movies as $movs) 
                    <option value="{{$movs->id}}">{{$movs->name}}</option>
                  @endforeach  
                </select>
              </div>

              <div class="form-group">
                <label for="text">Tên diễn viên:</label>
                <select class="form-control" id="nameCast" name="cast_id">
                  <option value="">Select...</option>
                  @foreach($casts as $cass) 
                    <option value="{{$cass->id}}">{{$cass->name}}</option>
                  @endforeach  
                </select>
              </div>
            <br>
            <input class="btn btn-outline-success mr-2" type="submit" name="add" value="THÊM">

            <a href="{{route("list-movCas")}}"><button type="button" class="btn btn-info">Danh sách</button></a>
        </form>
    </div>
</div>

@endsection