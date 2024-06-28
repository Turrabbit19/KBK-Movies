<?php
namespace App\Models;

class MovieCastModel extends BaseModel {
    protected $table = "movie_cast";

    public function getMovieCast() {
        $sql = "SELECT mc.*, c.name AS nameCast, m.name AS nameMovie
            FROM $this->table AS mc
            INNER JOIN casts AS c ON c.id = mc.cast_id
            INNER JOIN movies AS m ON m.id = mc.movie_id
            ORDER BY mc.movie_id
";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }
    public function addMovieCast($id, $movie_id, $cast_id) {
        $sql = "INSERT INTO $this->table(id, movie_id, cast_id) VALUES (?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id, $movie_id, $cast_id]);
    }
    public function delMovieCast($id) {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
    public function getDetailMovieCast($id) {
        $sql = "SELECT mc.*, c.name AS nameCast, m.name AS nameMovie
            FROM {$this->table} AS mc
            INNER JOIN casts AS c ON c.id = mc.cast_id
            INNER JOIN movies AS m ON m.id = mc.movie_id
            WHERE mc.id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function editMovieCast($id, $movie_id, $cast_id) {
        $sql = "UPDATE $this->table SET movie_id = ?, cast_id = ?, updated_at = CURRENT_TIMESTAMP WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$movie_id, $cast_id, $id]);
    }
}