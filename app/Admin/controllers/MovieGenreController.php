<?php
namespace App\Admin\controllers;
use App\Admin\models\GenreModel;
use App\Admin\models\MovieGenreModel;
use App\Admin\models\MovieModel;

class MovieGenreController extends BaseController {
    protected $movieGenreModel;
    protected $movieModel;
    protected $genreModel; 

    public function __construct() {
        $this->movieGenreModel = new MovieGenreModel();
        $this->movieModel = new MovieModel();
        $this->genreModel = new GenreModel();
    }

    public function index() {
        $title = "KBK Admin";
        $movGens = $this->movieGenreModel->getMovieGenre();
        return $this->render("movie_genre.list", compact("title","movGens"));
    }
    public function add() {
        $title = "KBK Admin";
        $movies = $this->movieModel->getMovie();
        $genres = $this->genreModel->getGenre();
        return $this->render("movie_genre.add", compact("title","movies","genres"));
    }
    public function post() {
        if(isset($_POST['add']) && ($_POST['add']) != "") {
            $idMovie = $_POST["movie_id"];
            $idGenre = $_POST["genre_id"];

            $result = $this->movieGenreModel->addMovieGenre(NULL, $idMovie, $idGenre);
            if ($result) {
                redirect('success', 'Thêm mới thành công', 'list-movGen');
            }
        }
    }
    public function delete($id) {
        $result = $this->movieGenreModel->delMovieGenre($id);
        if ($result) {
            redirect('success', 'Xóa thành công', 'list-movGen');
        }
    }
    public function detail($id) {
        $title = "KBK Admin";
        $movies = $this->movieModel->getMovie();
        $genres = $this->genreModel->getGenre();

        $movGen = $this->movieGenreModel->getDetailMovieGenre($id);

        return $this->render("movie_genre.edit", compact("title","movies","genres","movGen"));
    }
    public function edit($id) {
        if(isset($_POST['edit']) && ($_POST['edit']) != '') {
            $idMovie = $_POST['movie_id'];
            $idGenre = $_POST['genre_id'];

            $result = $this->movieGenreModel->editMovieGenre($id, $idMovie, $idGenre);
            if ($result) {
                redirect('success', 'Sửa thành công', 'list-movGen');
            }
        }
    }
}