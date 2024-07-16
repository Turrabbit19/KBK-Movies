<?php
namespace App\admin\models;

class AccountModel extends BaseModel
{
    protected $table = 'accounts';

    public function getAccountAppear(){
        $sql = "SELECT * FROM $this->table WHERE status = 1 order by id";
        $this->setQuery($sql);
        return $this-> loadAllRows([]);
    }
    public function getAccountHidden(){
        $sql = "SELECT * FROM $this->table WHERE status = 0 order by id";
        $this->setQuery($sql);
        return $this-> loadAllRows([]);
    }

    public function hiddenAccount($id){
        $sql = "UPDATE $this->table SET status = 0, updated_at = CURRENT_TIMESTAMP WHERE id = ?";
        $this->setQuery($sql);
        return $this-> execute([$id]);
    }
    public function appearAccount($id){
        $sql = "UPDATE $this->table SET status = 1, updated_at = CURRENT_TIMESTAMP WHERE id = ?";
        $this->setQuery($sql);
        return $this-> execute([$id]);
    }
}