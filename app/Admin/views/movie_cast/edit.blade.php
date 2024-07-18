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
        <form action="{{ route('admin/edit-movCas/' . $movCas->id) }}" method="POST" class="m-3">
            <div class="form-group">
                <label for="nameMovie">Tên phim:</label>
                <select class="form-control" id="nameMovie" name="movie_id">
                    @foreach($movies as $movs)
                        <option value="{{ $movs->id }}" {{ $movs->id == $movCas->movie_id ? 'selected' : '' }}>
                            {{ $movs->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="nameCast">Tên diễn viên:</label>
                <select class="form-control" id="nameCast" name="cast_id">
                    @foreach($casts as $cass)
                        <option value="{{ $cass->id }}" {{ $cass->id == $movCas->cast_id ? 'selected' : '' }}>
                            {{ $cass->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <br>
            <input class="btn btn-outline-success mr-2" type="submit" name="edit" value="SỬA">
            <a href="{{ route('admin/list-movCas') }}"><button type="button" class="btn btn-info">Danh sách</button></a>
        </form>
    </div>
</div>
@endsection
