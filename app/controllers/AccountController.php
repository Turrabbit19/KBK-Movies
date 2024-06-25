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
}