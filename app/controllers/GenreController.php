<?php
namespace App\Controllers;
use App\Models\GenreModel;

class GenreController extends BaseController {
    protected $genreModel;

    public function __construct() 
    {
        $this->genreModel = new GenreModel();
    }

    public function listGenre() {
        $title = "KBK Admin";
        $genres = $this->genreModel->getGenre();
        return $this->render('genre.list', compact('genres', 'title'));
    }
    public function addGenre() {
        $title = "KBK Admin";
        return $this->render('genre.add', compact('title'));
    }
    public function postGenre() {
        if(isset($_POST['add']) && ($_POST['add']) != "") {
            $name = $_POST["name"];

            $result = $this->genreModel->addGenre(NULL, $name);
            if ($result) {
                redirect('success', 'Thêm mới thành công', 'list-genre');
            }
        }
    }
    public function delGenre($id) {
        $result = $this->genreModel->delGenre($id);
        if($result) {
            redirect('success', "Xóa thành công", "list-genre");
        }
    }
    public function detailGenre($id) {
        $title = "KBK Admin";
        $gen = $this->genreModel->getDetailGenre($id);
        $this->render('genre.edit', compact('gen', 'title'));
    }
    public function editGenre($id) {
        if(isset($_POST['edit']) && ($_POST['edit']) != '') {
            $name = $_POST['name'];

            $result = $this->genreModel->editGenre($id, $name);
            if ($result) {
                redirect('success', 'Sửa thành công', 'list-genre');
            }
        }
    }
    //test push 4.47
}