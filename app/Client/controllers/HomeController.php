<?php
namespace App\Client\controllers;

class HomeController extends BaseController
{
    public function index()
    {
        $title = "KBK Movie";
        return $this->render('layout.main', compact('title'));
    }
}