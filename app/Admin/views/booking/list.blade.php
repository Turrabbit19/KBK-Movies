@extends('layout.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-3">
    <div>
        <h1 class="h3 text-gray-800">Bookings</h1>
        <p class="mb-4">
            Đặt vé
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
            @if (count($bookings) > 0)
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Account</th>
                        <th>Showtime</th>
                        <th>Room</th>
                        <th>Seat</th>
                        <th>Seat_type</th>
                        <th>Food</th>
                        <th>Sale</th>
                        <th>Payment_method</th>
                        <th>Total_amount</th>
                        <th>Created_at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Account</th>
                        <th>Showtime</th>
                        <th>Room</th>
                        <th>Seat</th>
                        <th>Seat_type</th>
                        <th>Food</th>
                        <th>Sale</th>
                        <th>Payment_method</th>
                        <th>Total_amount</th>
                        <th>Created_at</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($bookings as $index => $booking)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $booking->ac_name }}</td>
                        <td>{{ (new \DateTime($booking->st_show_date))->format('d/m/Y') }}
                            {{ $booking->st_show_time }}
                        </td>
                        <td>{{ $booking->r_room_number }}</td>
                        <td>{{ $booking->s_seat_number }}</td>
                        <td>{{ $booking->stp_type_name }}</td>
                        <td>{{ $booking->f_name }}</td>
                        <td>{{ $booking->cp_sale }}</td>
                        <td>{{ $booking->bk_payment_method }}</td>
                        <td>{{ $booking->bk_total_amount }}</td>
                        <td>{{ (new \DateTime($booking->bk_created_at))->format('d/m/Y H:i:s') }}</td>

                        <td>
                            <a href="{{route("admin/del-booking/" . $booking->bk_id)}}" class="btn btn-danger btn-icon-split"
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
                <p>Không có vé nào được đặt.</p>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection