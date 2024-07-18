<?php
namespace App\admin\models;

class ReviewModel extends BaseModel
{
    protected $table = 'reviews';

    public function getReview(){
        $sql = "
        SELECT ac.name          AS ac_name,
                mv.name         AS mv_name,
                rw.content      AS rw_content,
                rw.rating       AS rw_rating,
                rw.created_at   AS rw_created_at,
                rw.updated_at   AS rw_updated_at,
                rw.status       AS rw_status,
                rw.id           AS rw_id
        FROM $this->table AS rw
        INNER JOIN accounts AS ac ON rw.account_id = ac.id
        INNER JOIN movies AS mv ON rw.movie_id = mv.id
        order by rw.id
        ";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }

    public function hiddenReview($id){
        $sql = "UPDATE $this->table SET status = 0, updated_at = CURRENT_TIMESTAMP WHERE id = ?";
        $this->setQuery($sql);
        return $this-> execute([$id]);
    }
    public function appearReview($id){
        $sql = "UPDATE $this->table SET status = 1, updated_at = CURRENT_TIMESTAMP WHERE id = ?";
        $this->setQuery($sql);
        return $this-> execute([$id]);
    }
}