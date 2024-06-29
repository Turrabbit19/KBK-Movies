<?php
namespace App\Controllers;
use App\Models\ReviewModel;

class ReviewController extends BaseController
{
    protected $reviews;

    public function __construct(){
        $this->reviews = New ReviewModel();
    }

    public function listReview(){
        $title = 'KBK Admin';
        $reviews = $this->reviews->getReview();
        return $this->render('review.list', compact('title', 'reviews'));
    }

    public function hiddenReview($id){
        $result = $this->reviews->hiddenReview($id);
        if($result){
            redirect('success', 'Ẩn bình luận thành công', 'list-review');
        }
    }
    public function appearReview($id){
        $result = $this->reviews->appearReview($id);
        if($result){
            redirect('success', 'Hiện bình luận thành công', 'list-review');
        }
    }
}