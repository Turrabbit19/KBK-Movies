@extends('layout.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-3">
    <div>
        <h1 class="h3 text-gray-800">Account</h1>
        <p class="mb-4">
            Tài khoản
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
            @if (count($accounts) > 0)
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Created_at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Created_at</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($accounts as $index => $account)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td class="text-center"><img src="{{BASE_URL_IMG . $account->avatar}}" alt="" width="120px" height="150px"></td>
                        <td>{{ $account->name }}</td>
                        <td>{{ $account->address }}</td>
                        <td>{{ $account->email }}</td>
                        <td>{{ $account->phone_number }}</td>
                        <td>{{ $account->password }}</td>
                        <td>{{ $account->role }}</td>
                        <td>{{ $account->created_at }}</td>

                        <td>
                            <a href="{{route("open-account/" . $account->id)}}" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </span>
                                <span class="text">Mở</span>
                            </a>

                            <a href="{{route("lock-account/" . $account->id)}}" class="btn btn-secondary btn-icon-split"
                                onclick="return confirm('Bạn có chắc chắn muốn khóa tài khoản không?!??')">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Khóa</span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="d-flex justify-content-center align-items-center">
                <p>Không có tài khoản nào được tìm thấy.</p>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection