<?php
namespace App\Models;

class GenreModel extends BaseModel {
    protected $table = "genres";

    public function getGenre() 
    { 
        $sql = "SELECT * FROM $this->table order by id";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
}