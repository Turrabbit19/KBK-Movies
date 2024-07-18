<?php
    namespace App\Admin\Controllers;

use App\Admin\Models\MovieModel;
use App\Admin\Models\RoomModel;
use App\Admin\Models\ShowTimeModel;

class ShowTimeController extends BaseController
    {
        protected $showTimeModel;
        protected $roomModel;
        protected $movieModel;


        public function __construct(){
            $this->showTimeModel = new ShowTimeModel();
            $this->movieModel = new MovieModel();
            $this->roomModel = new RoomModel();
        }

        public  function listShowTime()
        {
            $title = "KBK Movie";
            $stime = $this->showTimeModel ->getShowTime();
            return $this->render('showtime.list',compact('stime','title'));
        }

        public function addShowTime(){
            $title ="KBK Movie";
            $movie= $this->movieModel ->getMovie();
            $room= $this->roomModel ->getRoom();
            return $this->render('showtime.add', compact('movie','room','title'));
        }

        public function postShowTime(){
            if(isset($_POST['add']) && $_POST['add'] != ''){
                $room_id = $_POST['room_id'];
                $movie_id = $_POST['movie_id'];
                $show_date = $_POST['show_date'];
                $show_time = $_POST['show_time'];

                $result = $this->showTimeModel->addShowTime(NULL,$movie_id,$room_id,$show_date,$show_time);
                if($result){
                    redirect("success", "Thêm mới thành công", "list-showtime");
                }
            }
        }

        public function delShowTime($id){
            $result = $this->showTimeModel->delShowTime($id);
            if($result){
                redirect("success", "Xóa thành công", "list-showtime");
            }
        }

        public function getDetailShowTime($id){
            $title ="KBK Movie";
            $detailST = $this->showTimeModel->getDetailShowTime($id);
            $movs=$this->movieModel->getMovie();
            $rOm=$this->roomModel->getRoom();
            return $this->render('showtime.edit',compact('detailST','movs','rOm','title'));
        }

        public function editShowTime($id){
            if(isset($_POST['edit']) && $_POST['edit'] != ''){
                $room_id = $_POST['room_id'];
                $movie_id = $_POST['movie_id'];
                $show_date = $_POST['show_date'];
                $show_time = $_POST['show_time'];

                $result = $this->showTimeModel->editShowTime($id,$movie_id,$room_id,$show_date,$show_time);
                if($result){
                    redirect("success", "Sửa thành công", "list-showtime");
                }
            }
        }
    }
?>