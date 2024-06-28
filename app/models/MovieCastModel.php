<?php
namespace App\Models;

class MovieCastModel extends BaseModel {
    protected $table = "movie_cast";

    public function getMovieCast() {
        $sql = "SELECT $this->table.id as id, casts.name as nameCast, movies.name as nameMovie,
        $this->table.created_at as created_at, $this->table.updated_at as updated_at FROM $this->table 
        INNER JOIN casts ON casts.id = $this->table.cast_id
        INNER JOIN movies ON movies.id = $this->table.movie_id
        order by $this->table.movie_id";
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
        $sql = "SELECT $this->table.id as id, 
                        $this->table.cast_id as idCast, casts.name as nameCast, 
                        $this->table.movie_id as idMovie, movies.name as nameMovie FROM $this->table 
        INNER JOIN casts ON casts.id = $this->table .cast_id
        INNER JOIN movies ON movies.id = $this->table .movie_id
        WHERE $this->table.id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function editMovieCast($id, $movie_id, $cast_id) {
        $sql = "UPDATE $this->table SET movie_id = ?, cast_id = ?, updated_at = CURRENT_TIMESTAMP WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$movie_id, $cast_id, $id]);
    }
}