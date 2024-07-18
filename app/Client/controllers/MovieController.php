<?php
namespace App\Client\Controllers;

use App\Admin\Models\GenreModel;
use App\Admin\Models\LanguageModel;

use App\admin\models\MovieModel;
use App\admin\models\PhotoModel;

class MovieController extends BaseController
{
    protected  $movie;
    protected  $genre;
    protected  $language;
    protected  $photo;


    public function __construct(){
        $this->movie = New MovieModel(); 
        $this->language = New LanguageModel(); 
        $this->genre = New GenreModel(); 
        $this->photo = New PhotoModel(); 
       
    }
    public function getViewMovie() {
        $list = $this->movie->getMovie();
        $listGen = $this->genre->getGenre();
        $listLang = $this->language->getLanguage();
        $listPhoto = $this->photo->getPhoto();
        return $this->render('movie.index',compact('list','listGen','listLang','listPhoto'));
    }
}