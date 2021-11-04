<?php
require_once(ROOT_PATH .'/Models/Main/Validation.php');
require_once(ROOT_PATH .'/Models/Main/Staff/Resist/Instrument.php');
require_once(ROOT_PATH .'/Models/Main/Staff/Resist/Access.php');
require_once(ROOT_PATH .'/Models/Main/Staff/Resist/Resist.php');
require_once(ROOT_PATH .'/Models/Main/Staff/Resist/Complete.php');


class ResistController{
    private $Validate;//Validateモデル
    private $Inst;//Instモデル
    private $Access;//Accessモデル
    private $Resist;//Resistモデル
    private $Complete;//Completeモデル

    public function __construct(){

        //モデルオブジェクトの作成
        $this->Validate = new Validation;
        $this->Inst = new Instrument;
        $this->Access = new Access;
        $this->Resist = new Resist;
        $this->Complete = new Complete;



    }

    // バリデーション機能
    public function validate(){
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $vali = $this->Validate->getErrors();

        return $vali;
      }
    }


    public function loginvali(){
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $vali = $this->Validate->loginErrors();

        return $vali;
      }
    }

    //楽器選択機能
    public function inst(){
        $inst = $this->Inst->getInst();
        return $inst;
    }


    //resist_comfirm.phpへのアクセス機能
    public function access(){
        $access = $this->Access->AccessSite();
        return $access;
    }

    

    //登録機能
    public function resist(){
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $resist = $this->Resist->ResistUser();
      return $resist;
      }
    }

    //resist_complete.phpへのアクセス
    public function complete(){
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $complete = $this->Complete->AccessSite();
        return $complete;
        }
    }



}


?>