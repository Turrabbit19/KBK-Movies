@extends('layout.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-3">
    <div>
        <h1 class="h3 text-gray-800">Movie + Genre</h1>
        <p class="mb-4">
            Luồng phim + thể loại
            <a target="_blank" href="https://datatables.net">KBK Movie</a>.
        </p>
    </div>

    <a href="{{route("admin/add-movGen")}}" class="btn btn-primary btn-icon-split">
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
            @if (count($movGens) > 0)
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Movie's Name</th>
                        <th>Genre's Name</th>  
                        <th>Created_at</th>
                        <th>Updated_at</th>                      
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Movie's Name</th>
                        <th>Genre's Name</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>   
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($movGens as $index => $mgs)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $mgs->nameMovie }}</td>
                        <td>{{ $mgs->nameGenre }}</td>
                        <td>{{ (new \DateTime($mgs->created_at))->format('d/m/Y H:i:s') }}</td>
                        <td>{{ $mgs->updated_at == $mgs->created_at ? ' ' : (new \DateTime($mgs->updated_at))->format("d/m/Y H:i:s") }}</td>

                        <td>
                            <a href="{{route("admin/detail-movGen/" . $mgs->id)}}" class="btn btn-warning">
                                <span class="icon text-white-50">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </span>
                            </a>
                        </td>
                        <td>
                            <a href="{{route("admin/del-movGen/" . $mgs->id)}}" class="btn btn-danger"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa không?!??')">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="d-flex justify-content-center align-items-center">
                <p>Không có luồng nào được tìm thấy.</p>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection