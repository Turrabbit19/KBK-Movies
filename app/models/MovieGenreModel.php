<?php
namespace App\Models;

class MovieGenreModel extends BaseModel {
    protected $table = "movie_genre";

    public function getMovieGenre() {
        $sql = "SELECT $this->table.id as id, genres.name as nameGenre, movies.name as nameMovie,
        $this->table.created_at as created_at, $this->table.updated_at as updated_at FROM $this->table 
        INNER JOIN genres ON genres.id = $this->table .genre_id
        INNER JOIN movies ON movies.id = $this->table .movie_id
        order by $this->table.movie_id";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }
    public function addMovieGenre($id, $movie_id, $genre_id) {
        $sql = "INSERT INTO $this->table(id, movie_id, genre_id) VALUES (?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id, $movie_id, $genre_id]);
    }
    public function delMovieGenre($id) {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
    public function getDetailMovieGenre($id) {
        $sql = "SELECT $this->table.id as id, 
                        $this->table.genre_id as idGenre, genres.name as nameGenre, 
                        $this->table.movie_id as idMovie, movies.name as nameMovie FROM $this->table 
        INNER JOIN genres ON genres.id = $this->table .genre_id
        INNER JOIN movies ON movies.id = $this->table .movie_id
        WHERE $this->table.id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function editMovieGenre($id, $movie_id, $genre_id) {
        $sql = "UPDATE $this->table SET movie_id = ?, genre_id = ?, updated_at = CURRENT_TIMESTAMP WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$movie_id, $genre_id, $id]);
    }
}