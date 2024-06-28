<?php
namespace App\Models;

class GenreModel extends BaseModel {
    protected $table = "genres";

    public function getGenre() 
    { 
        $sql = "SELECT * FROM $this->table order by name";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }

    public function addGenre($id, $name)
    {
        $sql = "INSERT INTO $this->table(id, name) VALUES (?,?)";
        $this->setQuery($sql);
        return $this->execute([$id, $name]);
    }
    public function delGenre($id) 
    {
        $sql = "DELETE FROM $this->table where id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
    function getDetailGenre($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function editGenre($id, $name)
    {
        $sql = "UPDATE $this->table SET name = ?, updated_at = CURRENT_TIMESTAMP WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$name, $id]);
    }
}