<?php
require_once(ROOT_PATH .'/Models/Reserve/Staff.php');





class StaffController{
    private $Staff;//Staffモデル




    public function __construct(){
        //リクエストパラメータの取得
        $this->request['get'] = $_GET;
        $this->request['post'] = $_POST;
        //モデルオブジェクト作成
        $this->Staff = new Staff;
    }

    public function staff(){
        $staff = $this->Staff->findAll();

        return $staff;

    }
}

?>