@extends('layout.main')

@section('content')

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route("admin/edit-foodCate/" . $foodCate->id) }}" method="POST" class="m-3">
            <div class="form-group">
                <label for="name">Tên danh mục:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$foodCate->name}}">
            </div>

            <br>
            <input class="btn btn-outline-warning mr-2" type="submit" name="edit" value="SỬA">

            <a href="{{route("admin/list-foodCate")}}"><button type="button" class="btn btn-info">Danh sách</button></a>
        </form>
    </div>
</div>

@endsection