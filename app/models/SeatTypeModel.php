<?php
    namespace App\Models;
    class SeatTypeModel extends BaseModel{
        protected $table = 'seat_types';

        public function getSeatType(){
            $sql = "SELECT * from $this->table order by id";
            $this->setQuery($sql);
            return $this-> loadAllRows([]);
        }

        public function addSeatType($id, $type_name, $price){
            $sql ="INSERT INTO $this->table(id, type_name , price) VALUES(?,?,?)";
            $this->setQuery($sql);
            return $this->execute([$id,$type_name, $price]);
        }
       
        public function delSeatType($id){
            $sql= "DELETE FROM $this->table where id =?";
            $this->setQuery($sql);
            return $this->execute([$id]);
        }

        public function detailSeatType($id){
            $sql = "SELECT * FROM $this->table where id =?";
            $this->setQuery($sql);
            return $this-> loadRow([$id]);
        }
        
        public function editSeatType($id , $type_name, $price){
            $sql = "UPDATE $this->table set type_name =? , price =? , updated_at =CURRENT_TIMESTAMP where id = ?";
            $this->setQuery($sql);
            return $this->execute([$type_name,$price,$id]);
        }
    }
?>