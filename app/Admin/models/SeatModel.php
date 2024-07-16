<?php
    namespace App\admin\models;

    class SeatModel extends BaseModel{
        protected $table = 'seats';

        public function getSeat(){
            $sql ="SELECT a.*, b.type_name, b.price, c.room_number, c.number_seats, c.seating_layout FROM seats AS a INNER JOIN seat_types AS b ON a.seat_type_id = b.id INNER JOIN rooms AS c ON c.id = a.room_id;";
            $this->setQuery($sql);
            return $this->loadAllRows([]);
        }

        public function addSeat($id,$room_id,$seat_type_id,$seat_number){
            $sql="INSERT INTO $this->table(id, room_id, seat_type_id, seat_number)VALUES(?,?,?,?)";
            $this->setQuery($sql);
            return $this ->execute([$id,$room_id,$seat_type_id,$seat_number]);
        }

        public function delSeat($id){
            $sql ="DELETE FROM $this->table where id = ?";
            $this->setQuery($sql);
            return $this-> execute([$id]);
        }

        public function getdetailSeat($id){
            $sql ="SELECT * FROM $this->table where id=?";
            $this->setQuery($sql);
            return $this-> loadRow([$id]);
        }

        public function editSeat($id,$room_id,$seat_type_id,$seat_number){
            $sql ="UPDATE $this->table set room_id=?, seat_type_id=?, seat_number=?, updated_at=CURRENT_TIMESTAMP where id=?";
            $this->setQuery($sql);
            return $this->execute([$room_id,$seat_type_id,$seat_number,$id]);
        }
    }
?>