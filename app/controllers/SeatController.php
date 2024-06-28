<?php
    namespace App\Controllers;

use App\Models\RoomModel;
use App\Models\SeatModel;
    use App\Models\SeatTypeModel;

    class SeatController extends BaseController{
        protected $seatModel;
        protected $roomModel;
        protected $seatTypeModel;

        public function __construct()
        {
            $this->seatModel = new SeatModel();
            $this->roomModel = new RoomModel();
            $this->seatTypeModel = new SeatTypeModel();
        }

        public function listSeat(){
            $title ="KBK Movie";
            $seats= $this->seatModel ->getSeat();
            $rooms = $this->roomModel->getRoom();
            $seatTypes = $this -> seatTypeModel ->getSeatType();
            return $this-> render('seat.list',compact('seats','rooms','seatTypes','title'));
        }

        public function addSeat(){
            $title ="KBK Movie";
            $seatTypes= $this->seatTypeModel ->getSeatType();
            $room= $this->roomModel ->getRoom();
            return $this->render('seat.add', compact('seatTypes','room','title'));
        }

        public function postSeat(){
            if(isset($_POST['add']) && ($_POST['add']) != ""){
                $room_id  = $_POST['room_id'];
                $seat_type_id = $_POST['seat_type_id']; 
                $seat_number  = $_POST['seat_number'];
                $result = $this -> seatModel ->addSeat(NULL ,$room_id,$seat_type_id,$seat_number);
                if($result){
                    redirect("success", "Thêm mới thành công", "list-seat");
                }
            }
        }

        public function detailSeat($id){
            $title ="KBK Movie";
            $seats=$this->seatModel->getdetailSeat($id);
            $sTs=$this->seatTypeModel->getSeatType();
            $rOm=$this->roomModel->getRoom();
            return $this-> render('seat.edit',compact('seats','sTs','rOm','title'));
        }

        public function editSeat($id){
            if(isset($_POST['edit']) && ($_POST['edit']) != ""){
                $room_id  = $_POST['room_id'];
                $seat_type_id = $_POST['seat_type_id']; 
                $seat_number  = $_POST['seat_number'];
                $result = $this->seatModel->editSeat($id ,$room_id,$seat_type_id,$seat_number);
                if($result){
                    redirect("success", "Sửa thành công", "list-seat");
                }
            }
        }

        public function delSeat($id){
            $result = $this->seatModel->delSeat($id);
            if($result){
                redirect("success", "Xóa thành công", "list-seat");
            }
          
        }
    }
?>