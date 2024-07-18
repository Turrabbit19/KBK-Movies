<?php
namespace App\Admin\controllers;
use App\Admin\models\MovieModel;
use App\Admin\models\PhotoModel;

class PhotoController extends BaseController {
    protected $photoModel;
    protected $movieModel;

    public function __construct() {
        $this->photoModel = new PhotoModel();
        $this->movieModel = new MovieModel();
    }
    
    public function index() {
        $title = "KBK Admin";
        $data = $this->photoModel->getPhoto();
        return $this->render("photo.list", compact("title","data"));
    }
    public function add() {
        $title = "KBK Admin";
        $movies = $this->movieModel->getMovie();
        return $this->render("photo.add", compact("title", "movies"));
    }
    public function post()
    {
        if (isset($_FILES['image']) && !empty($_FILES['image'])) {  
            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/kbk_movie/public/Admin/imgs/';

            $image = $_FILES['image']['name'];
            $imageFile = $uploadDir . basename($image);

            move_uploaded_file($_FILES['image']['tmp_name'], $imageFile);
        }
        if(isset($_POST['add']) && ($_POST['add']) != "") 
        {
            $name = $_POST['name'];
            $image = isset($image) ? $image : '';
            $idMovie = $_POST['movie_id'];

            $result = $this->photoModel->addPhoto(NULL, $name, $image, $idMovie);
            if ($result) {
                redirect("success", "Thêm mới thành công", "list-photo");
            }
        }
    }
    public function delete($id) {
        $result = $this->photoModel->delPhoto($id);
        if ($result) {
            redirect("success","Xóa thành công", "list-photo");
        }
    }
    public function detail($id) {
        $title = "KBK Admin";
        $photo = $this->photoModel->getDetailPhoto($id);
        $movies = $this->movieModel->getMovie();

        return $this->render('photo.edit', compact('title', 'photo', "movies"));
    }
    public function edit($id) {
        if (isset($_FILES['image']) && !empty($_FILES['image'])) {  
            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/kbk_movie/public/Admin/imgs/';

            $image = $_FILES['image']['name'];
            $imageFile = $uploadDir . basename($image);

            move_uploaded_file($_FILES['image']['tmp_name'], $imageFile);
        }
        if(isset($_POST['edit']) && ($_POST['edit']) != "") 
        {
            $name = $_POST['name'];
            $image = isset($image) ? $image : '';
            $idMovie = $_POST['movie_id'];

            $result = $this->photoModel->editPhoto($id, $name, $image, $idMovie);
            if ($result) {
                redirect("success", "Sửa thành công", "list-photo");
            }
        }
    }
}