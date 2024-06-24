<?php
namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        $title = "KBK Admin";
        return $this->render('layout.main', compact('title'));
    }
}