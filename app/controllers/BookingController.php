<?php
namespace App\Controllers;

use App\Models\BookingModel;

class BookingController extends BaseController
{
    protected $bookings;

    public function __construct(){
        $this->bookings = New BookingModel();
    }

    public function listBooking(){
        $title = 'KBK Admin';
        $bookings = $this->bookings->getBooking();
        return $this->render('booking.list', compact('title', 'bookings'));
    }

    public function delBooking($id){
        $result = $this->bookings->delBooking($id);
        if($result){
            redirect('success', 'Xóa thành công', 'list-booking');
        }
    }
}