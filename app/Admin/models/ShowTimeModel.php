<?php
namespace App\Admin\Models;

    class ShowTimeModel extends BaseModel{
        protected $table = 'showtimes';

        public function getShowTime()
        {
            $sql ="SELECT a.*, b.name, c.room_number, c.number_seats, c.seating_layout FROM $this->table  AS a INNER JOIN movies AS b ON a.movie_id = b.id INNER JOIN rooms AS c ON c.id = a.room_id";
            $this ->setQuery($sql);
            return $this -> loadAllRows([]);
        }

        public function addShowTime($id,$movie_id,$room_id,$show_date,$show_time){
            $sql ="INSERT INTO $this->table (id, movie_id,room_id,show_date,show_time) VALUES(?,?,?,?,?)";
            $this->setQuery($sql);
            return $this->execute([$id,$movie_id,$room_id,$show_date,$show_time]);
        }

        public function delShowTime($id) {
            $sql ="DELETE FROM $this->table where id = ?";
            $this->setQuery($sql);
            return $this ->execute([$id]);
        }

        public function getDetailShowTime($id){
            $sql = "SELECT * FROM $this->table where id =?";
            $this->setQuery($sql);
            return $this->loadRow([$id]);
        }

        public function editShowTime($id,$movie_id,$room_id,$show_date,$show_time){
            $sql ="UPDATE $this->table set movie_id=? ,room_id=? ,show_date=? ,show_time=?, updated_at=CURRENT_TIMESTAMP where id = ?";
            $this->setQuery($sql);
            return $this->execute([$movie_id,$room_id,$show_date,$show_time,$id]);
        }
    }
?>