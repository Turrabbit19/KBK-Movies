<?php

namespace App\Admin\Controllers;

use App\Admin\Models\MovieModel;

class MovieController extends BaseController
{
    protected $movieModel;

    public function __construct()
    {
        $this->movieModel = new MovieModel();
    }

    public function listMovie()
    {
        $title = "KBK Admin";
        $movies = $this->movieModel->getMovie();
        return $this->render('movie.list', compact('movies', 'title'));
    }

    public function addMovie()
    {
        $title = "KBK Admin";
        return $this->render('movie.add', compact('title'));
    }

    public function postMovie()
    {
        if (isset($_FILES['poster']) && !empty($_FILES['poster'])) {
            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/kbk_movie/public/Admin/imgs/';

            $poster = $_FILES['poster']['name'];
            $posterFile = $uploadDir . basename($poster);

            move_uploaded_file($_FILES['poster']['tmp_name'], $posterFile);
        }

        if (isset($_FILES['avatar']) && !empty($_FILES['avatar'])) {
            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/kbk_movie/public/Admin/imgs/';

            $avatar = $_FILES['avatar']['name'];
            $avatarFile = $uploadDir . basename($avatar);

            move_uploaded_file($_FILES['avatar']['tmp_name'], $avatarFile);
        }

        if (isset($_POST['add']) && ($_POST['add']) != "") {
            $name = $_POST['name'];
            $director = $_POST['director'];
            $duration = $_POST['duration'];
            $release_date = $_POST['release_date'];
            $description = $_POST['description'];
            $trailer_url = $_POST['trailer_url'];
            $poster = isset($poster) ? $poster : '';
            $avatar = isset($avatar) ? $avatar : '';

            $result = $this->movieModel->addMovie(NULL,$name,$poster,$avatar,$director,
                $duration,$release_date,$description,$trailer_url);
            if ($result) {
                redirect("success", "Thêm mới thành công", "list-movie");
            }
        }
    }

    public function delMovie($id)
    {
        $result = $this->movieModel->delMovie($id);
        if ($result) {
            redirect("success", "Xóa thành công", "list-movie");
        }
    }

    public function detailMovie($id)
    {
        $title = "KBK Admin";
        $movie = $this->movieModel->getDetailMovie($id);
        return $this->render('movie.edit', compact('title', 'movie'));
    }

    public function editMovie($id)
    {
        if (isset($_FILES['poster']) && !empty($_FILES['poster'])) {
            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/kbk_movie/public/Admin/imgs/';

            $poster = $_FILES['poster']['name'];
            $posterFile = $uploadDir . basename($poster);

            move_uploaded_file($_FILES['poster']['tmp_name'], $posterFile);
        }

        if (isset($_FILES['avatar']) && !empty($_FILES['avatar'])) {
            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/kbk_movie/public/Admin/imgs/';

            $avatar = $_FILES['avatar']['name'];
            $avatarFile = $uploadDir . basename($avatar);

            move_uploaded_file($_FILES['avatar']['tmp_name'], $avatarFile);
        }

        if (isset($_POST['edit']) && ($_POST['edit']) != "") {
            $name = $_POST['name'];
            $director = $_POST['director'];
            $duration = $_POST['duration'];
            $release_date = $_POST['release_date'];
            $description = $_POST['description'];
            $trailer_url = $_POST['trailer_url'];

            $result = $this->movieModel->editMovie($id, $name, $poster, $avatar, $director, $duration, $release_date, $description, $trailer_url);
            if ($result) {
                redirect("success", "Sửa thành công", "list-movie");
            }
        }
    }
}