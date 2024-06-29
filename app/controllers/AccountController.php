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

    public function listAccountAppear(){
        $title = "KBK Admin";
        $accounts = $this->accountModel->getAccountAppear();
        return $this->render('account.listAppear', compact('title', 'accounts'));
    }
    public function listAccountHidden(){
        $title = "KBK Admin";
        $accounts = $this->accountModel->getAccountHidden();
        return $this->render('account.listHidden', compact('title', 'accounts'));
    }

    public function hiddenAccount($id){
        $result = $this->accountModel->hiddenAccount($id);
        if($result){
            redirect('success', 'Ẩn tài khoản thành công', 'list-accountHidden');
        }
    }
    public function appearAccount($id){
        $result = $this->accountModel->appearAccount($id);
        if($result){
            redirect('success', 'Hiện tài khoản thành công', 'list-accountAppear');
        }
    }
}