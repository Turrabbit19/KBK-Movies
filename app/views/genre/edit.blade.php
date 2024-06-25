@extends('layout.main')

@section('content')

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route("edit-genre/" . $gen->id) }}" method="POST" class="m-3">
            <div class="form-group">
                <label for="name">Tên thể loại:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$gen->name}}">
            </div>

            <br>
            <input class="btn btn-outline-warning mr-2" type="submit" name="edit" value="Sửa">

            <a href="{{route("list-genre")}}"><button type="button" class="btn btn-info">Danh sách</button></a>
        </form>
    </div>
</div>

@endsection