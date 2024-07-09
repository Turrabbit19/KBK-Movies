<?php
    namespace App\Controllers;
    use App\Models\SeatTypeModel;

    class SeatTypeController extends BaseController{
        protected $seatTypeModel;

        public function __construct()
        {
            $this -> seatTypeModel = new SeatTypeModel();
        }

        public function listSeatType(){
            $title ="KBK Movie";
            $seatTypes = $this -> seatTypeModel ->getSeatType();
            return $this ->render('seat_type.list',compact('seatTypes','title'));
        }

        public function addSeatType(){
            $title ="KBK Movie";
            return $this ->render ('seat_type.add', compact('title'));
        }

        public function postSeatType(){
            if(isset($_POST['add']) && ($_POST['add']) != ""){
                $type_name = $_POST['type_name'];
                $price = $_POST['price'];
                $result = $this -> seatTypeModel ->addSeatType(NULL ,$type_name, $price);
                if($result){
                    redirect("success", "Thêm mới thành công", "list-seat-type");
                }
            }
        }
    
        public function delSeatType($id){
            $result = $this->seatTypeModel->delSeatType($id);
            if($result){
                redirect("success", "Xóa thành công", "list-seat-type");
            }
        }

        public function detailSeatType($id){
            $title ="KBK Movie";
            $seatTypes = $this-> seatTypeModel->detailSeatType($id);
            return $this-> render ('seat_type.edit', compact('seatTypes','title'));  
        }
        
        public function editSeatType($id){
            if(isset($_POST['edit']) && $_POST['edit']!=''){
                $type_name = $_POST['type_name'];
                $price = $_POST['price'];
                $result = $this->seatTypeModel->editSeatType($id,$type_name,$price);
                if($result){
                    redirect("success", "Sửa thành công", "list-seat-type");
                }
            }
        }
    }
?>