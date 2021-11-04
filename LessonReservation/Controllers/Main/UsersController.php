<?php
require_once(ROOT_PATH .'/Models/Main/Users.php');
require_once(ROOT_PATH .'/Models/Main/Member/Inst.php');
require_once(ROOT_PATH .'/Models/Main/Member/Schedule.php');



class UsersController{
    private $Users;//Usersモデル
    private $Insts;//Instsモデル
    private $Times;//Timeモデル


    public function __construct(){
        //リクエストパラメータの取得
        $this->request['get'] = $_GET;
        $this->request['post'] = $_POST;
        //モデルオブジェクト作成
        $this->Users = new Users;
        $this->Insts = new Insts;
        $this->Times = new Times;
    }

    //users全取得
    public function all(){
        $page = 0;
        if(isset($this->request['get']['userpage'])){
            $page = $this->request['get']['userpage'];
        }

        $users = $this->Users->findAll($page);
        $users_count = $this->Users->countAll();
        $params=[
            'users' => $users,
            'pages' => $users_count / 4
        ]; 


        return $params;
    }


    // 特定IDusersデータ取得
    public function users(){
        $users = $this->Users->findUsers();
        return $users;
    }

    //edit.phpにてusersデータ取得
    public function views(){
        $user = $this->Users->findById($this->request['get']['id']);
        return $user;
    }

    //intrumentalデータ取得
    public function inst(){
        $inst = $this->Insts->allInst();
        return $inst;
    }

    //usersデータアップデート
    public function update(){
        if(empty($this->request['get']['id'])){
            echo '指定のパラメータが不明です。このページを表示できません。';
        }
        $update = $this->Users->UpdateUsers($this->request['get']['id']);
        return $update;
    }

    //会員のスケジュール取得
    public function schedule(){
        $schedule = $this->Times->ScheduleCheck();
        return $schedule;
    }

    //予約スケジュールキャンセル
    public function cancel(){
        $cancell = $this->Times->CancelSchedule($this->request['get']['id']);
        return $cancell;
    }

    //会員情報削除
    public function delete(){
        $delete = $this->Users->DeleteUsers($this->request['get']['users_id']);
        return $delete;
    }

    



}

?>