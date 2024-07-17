<?php
namespace App\Admin\Models;

class FoodCateModel extends BaseModel
{
    protected $table = 'food_cgrs';

    public function getFoodCate(){
        $sql = "SELECT * FROM $this->table order by id";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }

    public function addFoodCate($id, $name){
        $sql = "INSERT INTO $this->table(id, name) VALUES(?, ?)";
        $this->setQuery($sql);
        return $this->execute([$id, $name]);
    }

    public function delFoodCate($id){
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }

    public function getDetailFoodCate($id){
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }

    public function editFoodCate($id, $name){
        $sql = "UPDATE $this->table SET name = ?, updated_at = CURRENT_TIMESTAMP WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$name, $id]);
    }
}