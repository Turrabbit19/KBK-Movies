<?php
namespace App\Admin\controllers;
use App\Admin\models\FoodCateModel;
use App\Admin\models\FoodModel;

class FoodController extends BaseController
{
    protected $foods;

    public function __construct(){
        $this->foods = New FoodModel();
    }

    public function listFood(){
        $title = 'KBK Admin';
        $foods = $this->foods->getFood();
        return $this->render('food.list', compact('title', 'foods'));
    }

    public function addFood(){
        $title = 'KBK Admin';
        $food_cgrs = (New FoodCateModel)->getFoodCate();
        return $this->render('food.add', compact('title', 'food_cgrs'));
    }

    public function postFood(){
        if(isset($_POST['add']) && ($_POST['add']) != ""){
            $name = $_POST['name'];
            $price = $_POST['price'];
            $price_sale = $_POST['price_sale'];
            $totals = $_POST['price_sale'] ? $_POST['price_sale'] : $_POST['price'];
            $quantity = $_POST['quantity'];
            $food_cgr_id = $_POST['food_cgr_id'];
            if(isset($_FILES['image']) && !empty($_FILES['image'])){
                $image = $_FILES['image']['name'];
                $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/kbk_movie/public/Admin/imgs/';
                $imageFile = $uploadDir . basename($image);
                move_uploaded_file($_FILES['image']['tmp_name'], $imageFile);
            }
            $result = $this->foods->addFood(
                NULL, 
                $name, 
                $image, 
                $price, 
                $price_sale, 
                $totals,
                $quantity, 
                $food_cgr_id
            );
            if($result){
                redirect('success', 'Thêm mới thành công', 'list-food');
            }
        }
    }

    public function delFood($id){
        $result = $this->foods->delFood($id);
        if($result){
            redirect('success', 'Xóa thành công', 'list-food');
        }
    }

    public function detailFood($id){
        $title = 'KBK Admin';
        $food_cgrs = (New FoodCateModel)->getFoodCate();
        $food = $this->foods->getDetailFood($id);
        return $this->render('food.edit', compact('title', 'food', 'food_cgrs'));
    }

    public function editFood($id){
        if(isset($_POST['edit']) && ($_POST['edit'])){
            $name = $_POST['name'];
            $price = $_POST['price'];
            $price_sale = $_POST['price_sale'];
            $totals = $_POST['price_sale'] ? $_POST['price_sale'] : $_POST['price'];
            $quantity = $_POST['quantity'];
            $food_cgr_id = $_POST['food_cgr_id'];
            if(isset($_FILES['image']) && !empty($_FILES['image'])){
                $image = $_FILES['image']['name'];
                $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/kbk_movie/public/Admin/imgs/';
                $imageFile = $uploadDir . basename($image);
                move_uploaded_file($_FILES['image']['tmp_name'], $imageFile);
            }
            $result = $this->foods->editFood(
                $id, 
                $name, 
                $image, 
                $price, 
                $price_sale, 
                $totals, 
                $quantity, 
                $food_cgr_id
            );
            if($result){
                redirect('success', 'Sửa thành công', 'list-food');
            }
        }
    }
}