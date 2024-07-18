@extends('layout.main')

@section('content')

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route("admin/post-foodCate") }}" method="POST" class="m-3">
            <div class="form-group">
                <label for="name">Tên danh mục:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <br>
            <input class="btn btn-outline-success mr-2" type="submit" name="add" value="THÊM">

            <a href="{{route("admin/list-foodCate")}}"><button type="button" class="btn btn-info">Danh sách</button></a>
        </form>
    </div>
</div>

@endsection