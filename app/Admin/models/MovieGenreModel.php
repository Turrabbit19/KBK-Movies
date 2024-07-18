<?php
namespace App\admin\models;

class MovieGenreModel extends BaseModel {
    protected $table = "movie_genre";

    public function getMovieGenre() {
        $sql = "SELECT mg.*, g.name AS nameGenre, m.name AS nameMovie
            FROM $this->table AS mg
        INNER JOIN genres AS g ON g.id = mg.genre_id
        INNER JOIN movies AS m ON m.id = mg.movie_id
        ORDER BY mg.movie_id";

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
        $sql = "SELECT mg.*, g.name AS nameGenre, m.name AS nameMovie
            FROM $this->table AS mg
            INNER JOIN genres AS g ON g.id = mg.genre_id
            INNER JOIN movies AS m ON m.id = mg.movie_id
            WHERE mg.id = ?
";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function editMovieGenre($id, $movie_id, $genre_id) {
        $sql = "UPDATE $this->table SET movie_id = ?, genre_id = ?, updated_at = CURRENT_TIMESTAMP WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$movie_id, $genre_id, $id]);
    }

    public function getAllMovieGenre($movieId) {
        $sql = "SELECT mg.*, g.name AS nameGenre, m.name AS nameMovie
            FROM $this->table AS mg
        INNER JOIN genres AS g ON g.id = mg.genre_id
        INNER JOIN movies AS m ON m.id = mg.movie_id
        WHERE mg.movie_id = ?
        ORDER BY mg.movie_id";
        $this->setQuery($sql);
        return $this->loadAllRows([$movieId]);
    }
}