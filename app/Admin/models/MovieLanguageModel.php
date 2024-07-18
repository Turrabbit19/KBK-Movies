<?php
namespace App\Admin\Models;

class MovieLanguageModel extends BaseModel {
    protected $table = "movie_language";

    public function getMovieLanguage() {
        $sql = "SELECT ml.*, l.name AS nameLanguage, m.name AS nameMovie
            FROM $this->table AS ml
            INNER JOIN languages AS l ON l.id = ml.language_id
            INNER JOIN movies AS m ON m.id = ml.movie_id
            ORDER BY ml.movie_id";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }
    public function getMovie()
        {
            $sql = "SELECT * FROM movies order by name";
            $this->setQuery($sql);
            return $this-> loadAllRows([]);
        }
        public function getLanguage() 
    { 
        $sql = "SELECT * FROM languages order by name";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }
    public function addMovieLanguage($id, $movie_id, $language_id) {
        $sql = "INSERT INTO $this->table(id, movie_id, language_id) VALUES (?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id, $movie_id, $language_id]);
    }
    public function delMovieLanguage($id) {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
    public function getDetailMovieLanguage($id) {
        $sql = "SELECT ml.*, l.name AS nameLanguage, m.name AS nameMovie
            FROM $this->table AS ml
            INNER JOIN languages AS l ON l.id = ml.language_id
            INNER JOIN movies AS m ON m.id = ml.movie_id
            WHERE ml.id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function editMovieLanguage($id, $movie_id, $language_id) {
        $sql = "UPDATE $this->table SET movie_id = ?, language_id = ?, updated_at = CURRENT_TIMESTAMP WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$movie_id, $language_id, $id]);
    }
}