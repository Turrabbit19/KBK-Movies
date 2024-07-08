<?php
namespace App\Controllers;
use App\Models\BillModel;

class BillController extends BaseController
{
    protected $bills;

    public function __construct()
    {
        $this->bills = New BillModel();
    }

    public function listBill(){
        $title = 'KBK Admin';
        $bills = $this->bills->getBill();
        return $this->render('bill.list', compact('title', 'bills'));
    }

    public function delBill($id){
        $result = $this->bills->delBill($id);
        if($result){
            redirect('success', 'Xóa thành công', 'list-bill');
        }
    }
}