<?php
require_once(ROOT_PATH .'/Models/Main/Staff.php');
require_once(ROOT_PATH .'/Models/Main/Staff/Edit/Inst.php');




class StaffController{
    private $Staff;//Staffモデル
    private $Inst;//Instsモデル



    public function __construct(){
        //リクエストパラメータの取得
        $this->request['get'] = $_GET;
        $this->request['post'] = $_POST;
        //モデルオブジェクト作成
        $this->Staff = new Staff;
        $this->Inst = new Inst;
    }

    //staff全データ取得
    public function all(){
        $page = 0;
        if(isset($this->request['get']['staffpage'])){
            $page = $this->request['get']['staffpage'];
        }
        $staff = $this->Staff->findAll($page);
        $staff_count = $this->Staff->countAll();
        $params=[
            'staff' => $staff,
            'pages' => $staff_count / 4
        ]; 
        return $params;
    }


    //edit.phpにてusersデータ取得
    public function views(){
        $staff = $this->Staff->findById($this->request['get']['id']);
        return $staff;
    }

    //intrumentalデータ取得
    public function inst(){
        $inst = $this->Inst->allInst();
        return $inst;
    }

    //staffデータアップデート
    public function update(){
        if(empty($this->request['get']['id'])){
            echo '指定のパラメータが不明です。このページを表示できません。';
        }
        $update = $this->Staff->UpdateUsers($this->request['get']['id']);
        return $update;
    }

    //会員情報削除
    public function delete(){
        $delete = $this->Staff->DeleteStaff($this->request['get']['staff']);
        return $delete;
    }
}

