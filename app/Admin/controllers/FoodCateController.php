<?php
namespace App\Admin\Controllers;

use App\Admin\Models\FoodCateModel;
use App\Admin\Models\FoodModel;

class FoodCateController extends BaseController
{
    protected $foodCateModel;

    public function __construct(){
        $this->foodCateModel = New FoodCateModel();
    }

    public function listFoodCate(){
        $title = 'KBK Admin';
        $foodCates = $this->foodCateModel->getFoodCate();
        return $this->render('food_cgr.list', compact('title', 'foodCates'));
    }

    public function addFoodCate(){
        $title = 'KBK Admin';
        return $this->render('food_cgr.add', compact('title'));
    }

    public function postFoodCate(){
        if(isset($_POST['add']) && ($_POST['add']) != ""){
            $name = $_POST['name'];
            $result = $this->foodCateModel->addFoodCate(NULL, $name);
            if($result){
                redirect('success', 'Thêm mới thành công', 'list-foodCate');
            }
        }
    }

    public function delFoodCate($id){
        $countFood_ID = (New FoodModel)->countFood_ID($id); // Kiểm tra nếu bị trùng ID thì thông báo không cho xóa
        if($countFood_ID && $countFood_ID->count > 0){
            redirect('errors', 'Không thể xóa mục này', 'list-foodCate');
        } else {
            $result = $this->foodCateModel->delFoodCate($id);
            if($result){
                redirect('success', 'Xóa thành công', 'list-foodCate');
            }
        }
    }

    public function detailFoodCate($id){
        $title = 'KBK Admin';
        $foodCate = $this->foodCateModel->getDetailFoodCate($id);
        return $this->render('food_cgr.edit', compact('title', 'foodCate'));
    }

    public function editFoodCate($id){
        if(isset($_POST['edit']) && ($_POST['edit']) != ""){
            $name = $_POST['name'];
            $result = $this->foodCateModel->editFoodCate($id, $name);
            if($result){
                redirect('success', 'Sửa thành công', 'list-foodCate');
            }
        }
    }
}