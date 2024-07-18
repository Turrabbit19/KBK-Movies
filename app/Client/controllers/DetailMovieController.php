<?php
namespace App\Client\Controllers;

use App\admin\models\MovieCastModel;
use App\admin\models\MovieGenreModel;
use App\admin\models\MovieLanguageModel;
use App\admin\models\MovieModel;
use App\admin\models\PhotoModel;

class DetailMovieController extends BaseController
{
    protected  $detailMovie;
    protected  $movieLan;
    protected  $movieGen;
    protected  $moviePho;
    protected  $movieCast;

    public function __construct(){
        $this->detailMovie = New MovieModel(); 
        $this->movieLan = New MovieLanguageModel(); 
        $this->movieGen = New MovieGenreModel(); 
        $this->moviePho = New PhotoModel(); 
        $this->movieCast = New MovieCastModel(); 
    }
    public function detailMovie($id){
        $detailMovie = $this->detailMovie->getDetailMovie($id);
        $movieId = $detailMovie->id;
        $languageMovie = $this->movieLan->getAllMovieLanguage($movieId);
        $genreMovie = $this->movieGen->getAllMovieGenre($movieId);
        $photoMovie = $this->moviePho->getAllPhoto($movieId);
        $castMovie = $this->movieCast->getAllMovieCast($movieId);
        return $this->render('detail-movie.detail-movie', 
        compact(
            'detailMovie', 
            'languageMovie', 
            'photoMovie', 
            'genreMovie',
            'castMovie'
        ));
    }
}