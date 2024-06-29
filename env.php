<?php
const BASE_URL = "http://localhost/kbk_movie/";
const BASE_URL_IMG = "http://localhost/kbk_movie/public/admin/imgs/";
const DBHOST = "localhost";
const DBNAME = "kbk_movie";
const DBCHARSET = "utf8";
const DBUSER = "root";
const DBPASS = "";

function redirect($key = "",$msg = "",$url ="") {
    $_SESSION[$key] = $msg;
    switch ($key) {
        case "errors":
            unset($_SESSION['success']);
            break;
        case "success":
            unset($_SESSION['errors']);
            break;
    }
    header('location: ' . BASE_URL . $url."?msg=".$key);die;
}

function route($name) {
    return BASE_URL.$name;
}

function debug($data) {
    echo "<pre>";
    print_r($data);
    die;
}