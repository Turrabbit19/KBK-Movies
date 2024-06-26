<?php
namespace App\Models;

class AccountModel extends BaseModel
{
    protected $table = 'accounts';

    public function getAccount(){
        $sql = "SELECT * FROM $this->table order by id";
        $this->setQuery($sql);
        return $this-> loadAllRows([]);
    }

    public function lockAccount($id){
        $sql = "UPDATE $this->table SET role = 0, updated_at = CURRENT_TIMESTAMP WHERE id = ?";
        $this->setQuery($sql);
        return $this-> execute([$id]);
    }
    public function openAccount($id){
        $sql = "UPDATE $this->table SET role = 1, updated_at = CURRENT_TIMESTAMP WHERE id = ?";
        $this->setQuery($sql);
        return $this-> execute([$id]);
    }
}