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
}