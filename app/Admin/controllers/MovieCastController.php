<?php
namespace App\Admin\controllers;
use App\Admin\models\CastModel;
use App\Admin\models\MovieCastModel;
use App\Admin\models\MovieModel;

class MovieCastController extends BaseController {
    protected $movieCastModel;
    protected $movieModel;
    protected $castModel; 

    public function __construct() {
        $this->movieCastModel = new MovieCastModel();
        $this->movieModel = new MovieModel();
        $this->castModel = new CastModel();
    }

    public function index() {
        $title = "KBK Admin";
        $movCass = $this->movieCastModel->getMovieCast();
        return $this->render("movie_cast.list", compact("title","movCass"));
    }
    public function add() {
        $title = "KBK Admin";
        $movies = $this->movieModel->getMovie();
        $casts = $this->castModel->getCast();
        return $this->render("movie_cast.add", compact("title","movies","casts"));
    }
    public function post() {
        if(isset($_POST['add']) && ($_POST['add']) != "") {
            $idMovie = $_POST["movie_id"];
            $idCast = $_POST["cast_id"];

            $result = $this->movieCastModel->addMovieCast(NULL, $idMovie, $idCast);
            if ($result) {
                redirect('success', 'Thêm mới thành công', 'list-movCas');
            }
        }
    }
    public function delete($id) {
        $result = $this->movieCastModel->delMovieCast($id);
        if ($result) {
            redirect('success', 'Xóa thành công', 'list-movCas');
        }
    }
    public function detail($id) {
        $title = "KBK Admin";
        $movies = $this->movieModel->getMovie();
        $casts = $this->castModel->getCast();

        $movCas = $this->movieCastModel->getDetailMovieCast($id);

        return $this->render("movie_cast.edit", compact("title","movies","casts","movCas"));
    }
    public function edit($id) {
        if(isset($_POST['edit']) && ($_POST['edit']) != '') {
            $idMovie = $_POST["movie_id"];
            $idCast = $_POST["cast_id"];

            $result = $this->movieCastModel->editMovieCast($id, $idMovie, $idCast);
            if ($result) {
                redirect('success', 'Sửa thành công', 'list-movCas');
            }
        }
    }
}