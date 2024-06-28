<?php
namespace App\Controllers;
use App\Models\CastModel;

class CastController extends BaseController
{
    protected $castModel;

    public function __construct()
    {
        $this->castModel = new CastModel();
    }

    public function listCast()
    {
        $title = "KBK Admin";
        $casts = $this->castModel->getCast();
        return $this->render('cast.list', compact('title', 'casts'));
    }

    public function addCast()
    {
        $title = "KBK Admin";
        return $this->render('cast.add', compact('title'));
    }

    public function postCast()
    {
        if (isset($_FILES['image']) && !empty($_FILES['image'])) {  
            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/kbk_movie/public/admin/imgs/'; // Thư mục đích để lưu file

            // Lấy tên file và đường dẫn đầy đủ
            $image = $_FILES['image']['name'];
            $imageFile = $uploadDir . basename($image);

            // Di chuyển file từ thư mục tạm thời đến thư mục đích
            move_uploaded_file($_FILES['image']['tmp_name'], $imageFile);
        }
        if(isset($_POST['add']) && ($_POST['add']) != "") 
        {
            $name = $_POST['name'];
            $image = isset($image) ? $image : '';

            $result = $this->castModel->addCast(NULL, $name, $image);
            if ($result) {
                redirect("success", "Thêm mới thành công", "list-cast");
            }
        }
    }
    public function delCast($id) {
        $result = $this->castModel->delCast($id);
        if ($result) {
            redirect("success","Xóa thành công", "list-cast");
        }
    }
    public function detailCast($id) {
        $title = "KBK Admin";
        $cast = $this->castModel->getDetailCast($id);
        return $this->render('cast.edit', compact('title', 'cast'));
    }
    public function editCast($id) {
        if (isset($_FILES['image']) && !empty($_FILES['image'])) {  
            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/kbk_movie/public/admin/imgs/';

            $image = $_FILES['image']['name'];
            $imageFile = $uploadDir . basename($image);

            move_uploaded_file($_FILES['image']['tmp_name'], $imageFile);
        }
        if(isset($_POST['edit']) && ($_POST['edit']) != "") 
        {
            $name = $_POST['name'];

            $result = $this->castModel->editCast($id, $name, $image);
            if ($result) {
                redirect("success", "Sửa thành công", "list-cast");
            }
        }
    }
}