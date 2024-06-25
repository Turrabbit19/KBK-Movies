<?php
namespace App\Models;

class LanguageModel extends BaseModel {
    protected $table = "languages";

    public function getLanguage() {
        $sql = "SELECT * FROM $this->table order by id";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }
    public function addLanguage($id, $name) {
        $sql = "INSERT INTO $this->table(id, name) VALUES (?, ?)";
        $this->setQuery($sql);
        return $this->execute([$id, $name]);
    }
    public function delLanguage($id) {
        $sql = "DELETE FROM $this->table where id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
    public function getDetailLanguage($id) {
        $sql = "SELECT * FROM $this->table where id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function editLanguage($id, $name) {
        $sql = "UPDATE $this->table SET name = ?, updated_at = CURRENT_TIMESTAMP WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$name, $id]);
    }
}