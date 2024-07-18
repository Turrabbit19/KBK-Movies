@extends('layout.main')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route("admin/post-food") }}" method="POST" class="m-3" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="file">Ảnh đồ ăn:</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
                <div class="form-group">
                    <label for="name">Danh mục đồ ăn:</label>
                    <select class="form-control" id="food_cgr_id" name="food_cgr_id">
                        <option value="0" selected>-- Vui lòng chọn danh mục đồ ăn --</option>
                        @foreach ($food_cgrs as $food_cgr)
                            <option value="{{ $food_cgr->id }}">{{ $food_cgr->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Tên đồ ăn:</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="name">Giá đồ ăn:</label>
                    <input type="text" class="form-control" id="price" name="price">
                </div>
                <div class="form-group">
                    <label for="name">Giá sale đồ ăn:</label>
                    <input type="text" class="form-control" id="price_sale" name="price_sale">
                </div>
                <div class="form-group">
                    <label for="name">Số lượng đồ ăn:</label>
                    <input type="text" class="form-control" id="quantity" name="quantity">
                </div>


                <br>
                <input class="btn btn-outline-success mr-2" type="submit" name="add" value="THÊM">

                <a href="{{route("admin/list-food")}}"><button type="button" class="btn btn-info">Danh sách</button></a>
            </form>
        </div>
    </div>

@endsection