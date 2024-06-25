<?php
namespace App\Controllers;
use App\Models\LanguageModel;

class LanguageController extends BaseController {
    protected $languageModel;

    public function __construct() {
        $this->languageModel = new LanguageModel();
    }

    public function listLanguage() {
        $title = "KBK Admin";
        $languages = $this->languageModel->getLanguage();
        return $this->render('language.list', compact("title","languages"));
    }
    public function addLanguage() {
        $title = "KBK Admin";
        return $this->render('language.add', compact('title'));
    }
    public function postLanguage() {
        if(isset($_POST['add']) && ($_POST['add']) != "") {
            $name = $_POST["name"];

            $result = $this->languageModel->addLanguage(NULL, $name);
            if($result) {
                redirect("success", "Thêm mới thành công", "list-language");
            }
        }
    }
    public function delLanguage($id) {
        $result = $this->languageModel->delLanguage($id);
        if($result) {
            redirect("success","Xóa thành công", "list-language");
        }
    }
    public function detailLanguage($id) {
        $title = "KBK Admin";
        $lan = $this->languageModel->getDetailLanguage($id);
        return $this->render("language.edit", compact("title","lan"));
    }
    public function editLanguage($id) {
        if(isset($_POST['edit']) && ($_POST['edit']) != "") {
            $name = $_POST["name"];

            $result = $this->languageModel->editLanguage($id, $name);
            if($result) {
                redirect("success", "Sửa thành công", "list-language");
            }
        }
    }
}