@extends('layout.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-3">
    <div>
        <h1 class="h3 text-gray-800">Foods</h1>
        <p class="mb-4">
            Đồ ăn
            <a target="_blank" href="https://datatables.net">KBK Movie</a>.
        </p>
    </div>

    <a href="{{route("add-food")}}" class="btn btn-primary btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-arrow-right"></i>
        </span>
        <span class="text">Thêm</span>
    </a>
</div>
@if (isset($_SESSION['errors']) && isset($_GET['msg']))
<div class="text-center mb-3">
    <span style="color: red">{{ $_SESSION['errors'] }}</span>
</div>
@endif
@if (isset($_SESSION['success']) && isset($_GET['msg']))
<div class="text-center mb-3">
    <span style="color: green">{{ $_SESSION['success'] }}</span>
</div>
@endif

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            @if (count($foods) > 0)
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Price_Sale</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Price_Sale</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($foods as $index => $food)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td class="text-center"><img src="{{BASE_URL_IMG . $food->f_image}}" alt="" width="120px" height="150px"></td>
                        <td>{{ $food->f_name }}</td>
                        <td>{{ $food->f_price }}</td>
                        <td>{{ $food->f_price_sale }}</td>
                        <td>{{ $food->f_quantity }}</td>
                        <td>{{ $food->fc_name }}</td>
                        <td>{{ $food->f_created_at }}</td>
                        <td>{{ ($food->f_updated_at == $food->f_created_at) ? "Chưa sửa" : $food->f_updated_at }}</td>

                        <td>
                            <a href="{{route("detail-food/" . $food->f_id)}}" class="btn btn-warning btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </span>
                                <span class="text">Sửa</span>
                            </a>

                            <a href="{{route("del-food/" . $food->f_id)}}" class="btn btn-danger btn-icon-split"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa không?!??')">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Xóa</span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="d-flex justify-content-center align-items-center">
                <p>Không có đồ ăn nào được tìm thấy.</p>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection