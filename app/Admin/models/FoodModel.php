<?php
namespace App\Admin\Models;

class FoodModel extends BaseModel
{
    protected $table = 'foods';

    public function getFood(){
        $sql = "
        SELECT  f.id         AS  f_id,
                f.name       AS  f_name,
                f.image      AS  f_image,
                f.price      AS  f_price,
                f.price_sale AS f_price_sale,
                f.quantity   AS f_quantity,
                f.created_at AS f_created_at,
                f.updated_at AS f_updated_at,
                fc.name      AS  fc_name,
                fc.id        AS  fc_id
        FROM $this->table AS f
        INNER JOIN food_cgrs AS fc ON f.food_cgr_id = fc.id
         order by f_id";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }

    public function addFood($id, $name, $image, $price, $price_sale, $totals, $quantity, $food_cgr_id){
        $sql = "INSERT INTO $this->table(id, name, image, price, price_sale, totals, quantity, food_cgr_id, created_at)
        VALUES(?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)";
        $this->setQuery($sql);
        return $this->execute([$id, $name, $image, $price, $price_sale, $totals, $quantity, $food_cgr_id]);
    }

    public function delFood($id){
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }

    public function getDetailFood($id){
        $sql = "
        SELECT  f.id            AS  f_id,
                f.name          AS  f_name,
                f.image         AS  f_image,
                f.price         AS  f_price,
                f.price_sale    AS  f_price_sale,
                f.quantity      AS  f_quantity,
                f.food_cgr_id   AS  f_food_cgr_id,
                fc.name         AS  fc_name,
                fc.id           AS  fc_id
        FROM $this->table AS f
        INNER JOIN food_cgrs AS fc ON f.food_cgr_id = fc.id
         WHERE f.id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }

    public function editFood($id, $name, $image, $price, $price_sale, $totals, $quantity, $food_cgr_id){
        if(!empty($image)){
            $sql = "UPDATE $this->table 
            SET name = ?, 
                image = ?, 
                price = ?, 
                price_sale = ?, 
                totals = ?, 
                quantity = ?, 
                food_cgr_id = ?, 
                updated_at = CURRENT_TIMESTAMP 
            WHERE id = ?
            ";
            $this->setQuery($sql);
            return $this->execute([$name, $image, $price, $price_sale, $totals, $quantity, $food_cgr_id, $id]);
        }else{
            $sql = "UPDATE $this->table 
            SET name = ?, 
                price = ?, 
                price_sale = ?, 
                totals = ?, 
                quantity = ?, 
                food_cgr_id = ?, 
                updated_at = CURRENT_TIMESTAMP 
            WHERE id = ?
            ";
            $this->setQuery($sql);
            return $this->execute([$name, $price, $price_sale, $totals, $quantity, $food_cgr_id, $id]);
        }
    }

    // Hàm này đếm số lượng food_cgr_id trùng với bên FoodCate hay không để xem xét xóa FoodCate
    public function countFood_ID($id){
        $sql = "SELECT COUNT(*) AS count FROM $this->table WHERE food_cgr_id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    
}