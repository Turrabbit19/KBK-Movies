<?php
namespace App\Controllers;

use App\Models\AccountModel;
use Collator;

class AccountController extends BaseController
{
    protected $accountModel;

    public function __construct()
    {
        $this->accountModel = New AccountModel();
    }

    public function listAccount(){
        $title = "KBK Admin";
        $accounts = $this->accountModel->getAccount();
        return $this->render('account.list', compact('title', 'accounts'));
    }

    public function lockAccount($id){
        $result = $this->accountModel->lockAccount($id);
        if($result){
            redirect('success', 'Khóa tài khoản thành công', 'list-account');
        }
    }
    public function openAccount($id){
        $result = $this->accountModel->openAccount($id);
        if($result){
            redirect('success', 'Mở tài khoản thành công', 'list-account');
        }
    }
}