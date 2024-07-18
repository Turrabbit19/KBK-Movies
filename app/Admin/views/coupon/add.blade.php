@extends('layout.main')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route("admin/post-coupon") }}" method="POST" class="m-3" enctype="multipart/form-data">
               
                <div class="form-group">
                    <label for="name">Tên Mã giảm giá:</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="sale">Giá :</label>
                    <input type="number" class="form-control" id="sale" name="sale">
                </div>
                <input class="btn btn-outline-success mr-2" type="submit" name="add" value="THÊM">

                <a href="{{route("admin/list-coupon")}}"><button type="button" class="btn btn-info">Danh sách</button></a>
            </form>
        </div>
    </div>

@endsection