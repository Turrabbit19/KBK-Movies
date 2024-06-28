@extends('layout.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-3">
    <div>
        <h1 class="h3 text-gray-800">Reviews</h1>
        <p class="mb-4">
            Bình luận
            <a target="_blank" href="https://datatables.net">KBK Movie</a>.
        </p>
    </div>
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
            @if (count($reviews) > 0)
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Account</th>
                        <th>Movie</th>
                        <th>Content</th>
                        <th>Rating</th>
                        <th>Status</th>
                        <th>Created_at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Account</th>
                        <th>Movie</th>
                        <th>Content</th>
                        <th>Rating</th>
                        <th>Status</th>
                        <th>Created_at</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($reviews as $index => $review)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $review->ac_name }}</td>
                        <td>{{ $review->mv_name }}</td>
                        <td>{{ $review->rw_content }}</td>
                        <td>{{ $review->rw_rating }}</td>
                        <td>{{ $review->rw_status }}</td>
                        <td>{{ $review->rw_created_at }}</td>

                        <td>
                            <a href="{{route("appear-review/" . $review->rw_id)}}" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </span>
                                <span class="text">Hiện</span>
                            </a>

                            <a href="{{route("hidden-review/" . $review->rw_id)}}" class="btn btn-secondary btn-icon-split"
                                onclick="return confirm('Bạn có chắc chắn muốn ẩn không?!??')">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Ẩn</span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="d-flex justify-content-center align-items-center">
                <p>Không có bình luận nào được tìm thấy.</p>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection