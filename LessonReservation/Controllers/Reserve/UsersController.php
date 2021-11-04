<?php
require_once(ROOT_PATH .'/Models/Reserve/Users.php');





class UsersController{
    private $Users;//Staffモデル




    public function __construct(){
        //リクエストパラメータの取得
        $this->request['get'] = $_GET;
        $this->request['post'] = $_POST;
        //モデルオブジェクト作成
        $this->Users = new Users;
    }

    public function users(){
        $users = $this->Users->findUsers();

        return $users;

    }
}

?>