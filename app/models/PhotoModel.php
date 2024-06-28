<?php
namespace App\Models;

class PhotoModel extends BaseModel {
    protected $table = "photos";

    public function getPhoto() {
        $sql = "SELECT p.*, movies.name AS nameMovie
                FROM $this->table as p
                INNER JOIN movies ON p.movie_id = movies.id
                order by movies.id";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }
    public function addPhoto($id, $name, $image, $movie_id) {
        $sql = "INSERT INTO $this->table(id, name, image, movie_id) VALUES(?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id, $name, $image, $movie_id]);
    }
    public function delPhoto($id) {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
    public function getDetailPhoto($id) {
        $sql = "SELECT p.*, movies.name AS nameMovie
                FROM $this->table as p
                INNER JOIN movies ON p.movie_id = movies.id
                where p.id = ?";
                $this->setQuery($sql);
                return $this->loadRow([$id]);
    }
    public function editPhoto($id, $name, $image, $movie_id) {
        if(!empty($image)) {
        $sql = "UPDATE $this->table SET name=?, image=?, movie_id=?, updated_at = CURRENT_TIMESTAMP WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$name, $image, $movie_id, $id]);
        } else {
            $sql = "UPDATE $this->table SET name=?, movie_id=?, updated_at = CURRENT_TIMESTAMP WHERE id = ?";
            $this->setQuery($sql);
            return $this->execute([$name, $movie_id, $id]);
        }
    }
}