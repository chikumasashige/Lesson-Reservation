<?php
require_once(ROOT_PATH .'/Models/Change/Validation.php');
require_once(ROOT_PATH .'/Models/Change/Send.php');
require_once(ROOT_PATH .'/Models/Change/Access.php');
require_once(ROOT_PATH .'/Models/Change/Change.php');



class ChangeController{
    private $Validation;//Validationモデル
    private $Send;//Sendモデル
    private $Access;//Accessモデル
    private $Change;//Changeモデル


    public function __construct(){
        // モデルオブジェクトの作成
        $this->Validation = new Validation;
        $this->Send = new Send;
        $this->Access = new Access;
        $this->Change = new Change;
    }

    // バリデーション機能
    public function validation(){
      if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
        $validate = $this->Validation-> getErrors();

        return $validate;
      }
    }

    //パスワードバリデーション
    public function passVali(){
      if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
        $validate = $this->Validation-> passErrors();

        return $validate;
      }
    }

    //メール送信機能
    public function send(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){ 
          $send = $this->Send-> sendMail();
  
          return $send;
        }
    }

    //mail_complete.phpへのアクセス機能
    public function access(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($errors)){ 
          $access = $this->Access-> AccessSite();
  
          return $access;
        }
    }

    // pasword変更機能
    public function change(){
      if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($errors)){ 
        $change = $this->Change-> ChangePass();

        return $change;
      }
    }

    //change_complete.phpへのアクセス機能
    public function complete(){
      if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($errors)){ 
        $complete = $this->Access-> ChangeComplete();

        return $complete;
      }
    }
}
?>
