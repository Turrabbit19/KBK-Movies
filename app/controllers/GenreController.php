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
}