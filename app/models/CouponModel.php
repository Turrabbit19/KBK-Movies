<?php
    namespace App\Models;
    
    class CouponModel extends BaseModel{
        protected $table = 'coupons';

        public function getCoupon(){
            $sql = "SELECT * from $this->table order by id";
            $this-> setQuery($sql);
            return $this->loadAllRows([]); 
        }

        public function addCoupon($id, $name ,$sale){
            $sql ="INSERT INTO $this->table(id, name ,sale) VALUES (?, ?, ?)";
            $this->setQuery($sql);
            return $this -> execute([$id, $name, $sale]);
        }

        public function delCoupon($id){
            $sql = "DELETE FROM $this->table where id = ?";
            $this->setQuery($sql);
            return $this->execute([$id]);
        }
        
        public function getDeteilCoupon($id){
            $sql ="SELECT * FROM $this->table where id = ?";
            $this->setQuery($sql);
            return $this->loadRow([$id]);
        }

        public function editCoupon($id, $name, $sale){
            $sql ="UPDATE $this->table SET name =?, sale =? , updated_at = CURRENT_TIMESTAMP where id =?";
            $this->setQuery($sql);
            return $this->execute([$name, $sale,$id]);
        }
    }
?>