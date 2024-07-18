<?php
    namespace App\admin\models;

    class MovieModel extends BaseModel {
        protected $table = 'movies';

        public function getMovie()
        {
            $sql = "SELECT * FROM $this->table order by name";
            $this->setQuery($sql);
            return $this-> loadAllRows([]);
        }
        public function addMovie($id, $name, $poster, $avatar, $director, $duration, $release_date, $description, $trailer_url)
        {
            $sql ="INSERT INTO $this->table(id, name, poster, avatar, director, duration, release_date, description, trailer_url) VALUES(?,?,?,?,?,?,?,?,?)";
            $this->setQuery($sql);
            return $this->execute([$id, $name, $poster, $avatar, $director, $duration, $release_date, $description, $trailer_url]);
        }
        public function delMovie($id){
            $sql = "DELETE FROM $this->table where id=?";
            $this->setQuery($sql);
            return $this->execute([$id]);
        }
        public function getDetailMovie($id){
            $sql = "SELECT * FROM $this->table where id =?";
            $this->setQuery($sql);
            return $this->loadRow([$id]);
        }
        public function editMovie($id, $name, $poster, $avatar, $director, $duration, $release_date, $description, $trailer_url)
        {
            if(!empty($avatar) ) {
                $sql = "UPDATE $this->table SET name = ? , avatar = ?, director = ?,duration = ? , description = ? , trailer_url = ?,updated_at = CURRENT_TIMESTAMP where id = ?";
                $this->setQuery($sql);
                return $this -> execute([ $name, $avatar, $director, $duration, $description, $trailer_url,$id]);
            } else if(!empty($poster)) {
                $sql = "UPDATE $this->table SET name = ? , poster = ?, director = ?,duration = ? , description = ? , trailer_url = ?,updated_at = CURRENT_TIMESTAMP where id = ?";
                $this->setQuery($sql);
                return $this -> execute([ $name, $poster,$director, $duration, $description, $trailer_url,$id]);
            } else if(!empty($release_date)){
                $sql = "UPDATE $this->table SET name = ? , director = ?,duration = ? , release_date = ?, description = ? , trailer_url = ?,updated_at = CURRENT_TIMESTAMP where id = ?";
                $this->setQuery($sql);
                return $this -> execute([ $name, $director, $duration, $release_date ,$description, $trailer_url,$id]);
            }else{
                $sql = "UPDATE $this->table set name = ? , director = ?,duration = ? , description = ? , trailer_url = ?,updated_at = CURRENT_TIMESTAMP where id = ?";
                $this->setQuery($sql);
                return $this -> execute([$name, $director, $duration, $description, $trailer_url ,$id]);
            }
        }
        
    }
?>