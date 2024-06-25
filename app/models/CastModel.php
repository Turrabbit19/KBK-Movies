<?php
namespace App\Models;

class CastModel extends BaseModel {
    protected $table = "casts";

    public function getCast() {
        $sql = "SELECT * FROM $this->table order by id";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }
    public function addCast($id, $name, $image) {
        $sql = "INSERT INTO $this->table(id, name, image) VALUES (?, ?, ?)";
        $this->setQuery($sql);
        return $this->execute([$id, $name, $image]);
    }
    public function delCast($id) {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
    public function getDetailCast($id) {
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function editCast($id, $name, $image) {
        if(!empty($image)) {
            $sql = "UPDATE $this->table SET name = ?, image = ?, updated_at = CURRENT_TIMESTAMP where id = ?";
            $this->setQuery($sql);
            return $this->execute([$name, $image, $id]);
        } else {
            $sql = "UPDATE $this->table SET name = ?, updated_at = CURRENT_TIMESTAMP where id = ?";
            $this->setQuery($sql);
            return $this->execute([$name, $id]);
        }
    }
}