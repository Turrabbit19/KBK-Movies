<?php
    namespace App\Admin\controllers;
    use App\Admin\models\RoomModel;

    class RoomController extends BaseController{
        protected $roomModel;

        public function __construct(){
            $this->roomModel = new RoomModel();
        }

        public function listRoom(){
            $title ="KBK Admin";
            $rooms = $this->roomModel->getRoom();
            return $this ->render('room.list',compact('rooms','title'));
        }

        public function addRoom(){
            $title ="KBK Movie";
            return $this -> render('room.add', compact('title'));
        }

        public function postRoom(){
            if(isset($_POST['add']) && $_POST['add'] != ""){
                $room_number = $_POST['room_number'];
                $number_seats = $_POST['number_seats'];

                $result = $this->roomModel->addRoom(NULL , $room_number , $number_seats , NULL);
                if($result){
                    redirect('success', 'Thêm mới thành công', 'list-room');
                }
            }
        }

        public function delRoom($id){
            $result = $this->roomModel->delRoom($id);
            if($result) {
                redirect('success', "Xóa thành công", "list-room");
            }
        }

        public function getDetailRoom($id){
            $title ="KBK Movie";
            $roms = $this->roomModel->getDetailRoom($id);
            return $this -> render('room.edit', compact('roms','title'));
        }

        public function editRoom($id){
            if(isset($_POST['edit']) && $_POST['edit'] != ""){
                $room_number = $_POST['room_number'];
                $number_seats = $_POST['number_seats'];

                $result = $this->roomModel-> editRoom($id , $room_number , $number_seats , NULL);
                if($result){
                    redirect('success', 'Sửa thành công', 'list-room');
                }
            }

           
        }
    }
?>