<?php
namespace App\Admin\Controllers;
use App\Admin\Models\LanguageModel;
use App\Admin\Models\MovieLanguageModel;
use App\Admin\Models\MovieModel;

class MovieLanguangeController extends BaseController {
    protected $movieLanguageModel;
    protected $movieModel;
    protected $languageModel;

    public function __construct() {
        $this->movieLanguageModel = new MovieLanguageModel();
        $this->movieModel = new MovieModel();
        $this->languageModel = new LanguageModel();
    }

    public function index() {
        $title = "KBK Admin";
        $movLans = $this->movieLanguageModel->getMovieLanguage();
        return $this->render("movie_language.list", compact("title","movLans"));
    }
    public function add() {
        $title = "KBK Admin";
        $movies = $this->movieModel->getMovie();
        $languages = $this->languageModel->getLanguage();
        return $this->render("movie_language.add", compact("title","movies","languages"));
    }
    public function post() {
        if(isset($_POST['add']) && ($_POST['add']) != "") {
            $idMovie = $_POST["movie_id"];
            $idLanguage = $_POST["language_id"];

            $result = $this->movieLanguageModel->addMovieLanguage(NULL, $idMovie, $idLanguage);
            if ($result) {
                redirect('success', 'Thêm mới thành công', 'list-movLan');
            }
        }
    }
    public function delete($id) {
        $result = $this->movieLanguageModel->delMovieLanguage($id);
        if ($result) {
            redirect('success', 'Xóa thành công', 'list-movLan');
        }
    }
    public function detail($id) {
        $title = "KBK Admin";
        $movies = $this->movieModel->getMovie();
        $languages = $this->languageModel->getLanguage();

        $movLan = $this->movieLanguageModel->getDetailMovieLanguage($id);

        return $this->render("movie_language.edit", compact("title","movies","languages","movLan"));
    }
    public function edit($id) {
        if(isset($_POST['edit']) && ($_POST['edit']) != '') {
            $idMovie = $_POST["movie_id"];
            $idLanguage = $_POST["language_id"];

            $result = $this->movieLanguageModel->editMovieLanguage($id, $idMovie, $idLanguage);
            if ($result) {
                redirect('success', 'Sửa thành công', 'list-movLan');
            }
        }
    }
}