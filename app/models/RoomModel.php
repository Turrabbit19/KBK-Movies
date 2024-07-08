<?php
    namespace App\Models;
    class RoomModel extends BaseModel{
        protected $table = 'rooms';

        public function getRoom(){
            $sql = "SELECT * FROM $this->table order by id";
            $this->setQuery($sql);
            return $this-> loadAllRows([]);
        }

        public function addRoom($id , $room_number , $number_seats , $seating_layout){
            $sql = "INSERT INTO $this->table (id ,room_number, number_seats, seating_layout) VALUES (?, ? , ?, ?)";
            $this-> setQuery($sql);
            return $this-> execute([$id , $room_number , $number_seats , $seating_layout]);
        }

        public function getDetailRoom($id){
            $sql ="SELECT * FROM $this->table where id =?";
            $this->setQuery($sql);
            return $this -> loadRow([$id]);
        }

        public function delRoom($id){
            $sql= "DELETE FROM $this->table where id =?";
            $this->setQuery($sql);
            return $this->execute([$id]);
        }

        public function editRoom($id, $room_number , $number_seats , $seating_layout){
            $sql ="UPDATE $this->table set room_number = ? , number_seats =? , seating_layout =? where id =?";
            $this->setQuery($sql);
            return $this->execute([$room_number , $number_seats , $seating_layout, $id]);
        }
    }
?>