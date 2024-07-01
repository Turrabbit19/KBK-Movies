@extends('layout.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-3">
    <div>
        <h1 class="h3 text-gray-800">ShowTime</h1>
        <p class="mb-4">
             Giờ chiếu
            <a target="_blank" href="https://datatables.net">KBK Movie</a>.
        </p>
    </div>

    <a href="{{route("add-showtime")}}" class="btn btn-primary btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-arrow-right"></i>
        </span>
        <span class="text">Thêm</span>
    </a>
</div>

@if (isset($_SESSION['success']) && isset($_GET['msg']))
<div class="text-center mb-3">
    <span style="color: green">{{ $_SESSION['success'] }}</span>
</div>
@endif
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            @if (count($stime) > 0)
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>movie_id</th>
                        <th>room_id</th>
                        <th>show_date </th>
                        <th>show_time </th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>movie_id</th>
                        <th>room_id</th>
                        <th>show_date </th>
                        <th>show_time </th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($stime as $index => $st )
              
                   
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $st->name }}</td>
                        <td>{{ $st->room_number }}</td>
                        <td>{{ date('d-m-Y', strtotime($st->show_date))  }}</td>
                        <td>{{ $st->show_time }}</td>   
                        <td>
                            <a href="{{route("detail-showtime/" . $st->id)}}" class="btn btn-warning btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </span>
                                <span class="text">Sửa</span>
                            </a>

                            <a href="{{route("del-showtime/" . $st->id)}}" class="btn btn-danger btn-icon-split"
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
                <p>Không có thể loại nào được tìm thấy.</p>
            </div>
            @endif
        </div>
{{-- update for pull request --}}
    </div>
</div>

@endsection