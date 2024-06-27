<?php
    namespace App\Controllers;
use App\Models\CouponModel;

    class CouponController extends BaseController{
        protected $couponModel;

        public function __construct()
        {
            $this -> couponModel = new CouponModel();
        }

        public function listCoupon(){
            $title = "KBK_Admin";
            $coupons = $this->couponModel->getCoupon();
            return $this->render('coupon.list', compact('coupons','title'));
        }

        public function addCoupon(){
            $title = "KBK_Admin";
            return $this-> render('coupon.add', compact('title'));
        }

        public function postCoupon(){
            if(isset($_POST['add']) && ($_POST['add']) != ""){
                $name = $_POST['name'];
                $sale = $_POST['sale'];
                $result = $this->couponModel->addCoupon(NULL,$name,$sale);
                if ($result) {
                    redirect("success", "Thêm mới thành công", "list-coupon");
                }
            }
        }

        public function delCoupon($id){
            $result = $this->couponModel ->delCoupon($id);
            if ($result) {
                redirect("success", "Xóa thành công", "list-coupon");
            }
        }

        public function detailCoupon($id){
            $title ="KBK_Admin";
            $coupon = $this->couponModel ->getDeteilCoupon($id);
            return $this ->render('coupon.edit', compact('coupon','title'));
        }

        public function editCoupon($id){
            if(isset($_POST['edit']) && ($_POST['edit']) != ""){
                $name = $_POST['name'];
                $sale = $_POST['sale'];
                $result = $this->couponModel->editCoupon($id,$name,$sale);
                if ($result) {
                    redirect("success", "Thêm mới thành công", "list-coupon");
                }
            }
        }
    }   
?>