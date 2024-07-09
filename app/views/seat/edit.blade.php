@extends('layout.main')

@section('content')

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route("edit-seat/" . $seats->id) }}" method="POST" class="m-3">
       
            <div class="form-group">
                <label for="room_id">Phòng:</label>
                <select name="room_id" id="room_id" class="form-control">
                    <option value="">Select...</option>
                    @foreach ($rOm as $rom)
                        <option value="{{ $rom->id }}" {{ $rom->id == $seats->room_id ? 'selected' : '' }}>{{ $rom->room_number }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="seat_type_id">Loại ghế:</label>
                <select name="seat_type_id" id="seat_type_id" class="form-control">
                    <option value="">Select...</option>
                    @foreach ($sTs as $seatTy)
                        <option value="{{ $seatTy->id }}" {{ $seatTy->id == $seats->seat_type_id ? 'selected' : '' }}>{{ $seatTy->type_name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="seat_number">Số ghế:</label>
                <input type="number" class="form-control" id="seat_number" name="seat_number" value="{{$seats->seat_number}}">
            </div>
            <br>
            <input class="btn btn-outline-warning mr-2" type="submit" name="edit" value="SỬA">

            <a href="{{route("list-seat")}}"><button type="button" class="btn btn-info">Danh sách</button></a>
        </form>
    </div>
</div>

@endsection