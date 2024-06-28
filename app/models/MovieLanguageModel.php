<?php
namespace App\Models;

class MovieLanguageModel extends BaseModel {
    protected $table = "movie_language";

    public function getMovieLanguage() {
        $sql = "SELECT $this->table.id as id, languages.name as nameLanguage, movies.name as nameMovie,
        $this->table.created_at as created_at, $this->table.updated_at as updated_at FROM $this->table 
        INNER JOIN languages ON languages.id = $this->table .language_id	
        INNER JOIN movies ON movies.id = $this->table .movie_id
        order by $this->table.movie_id";
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
        $sql = "SELECT $this->table.id as id, 
                        $this->table.language_id as idLanguage, languages.name as nameLanguage, 
                        $this->table.movie_id as idMovie, movies.name as nameMovie FROM $this->table 
        INNER JOIN languages ON languages.id = $this->table .language_id
        INNER JOIN movies ON movies.id = $this->table .movie_id
        WHERE $this->table.id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function editMovieLanguage($id, $movie_id, $language_id) {
        $sql = "UPDATE $this->table SET movie_id = ?, language_id = ?, updated_at = CURRENT_TIMESTAMP WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$movie_id, $language_id, $id]);
    }
}