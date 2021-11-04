<?php
require_once(ROOT_PATH .'/Models/Reserve/Reserve.php');





class TimeController{
    private $Time;//Timeモデル




    public function __construct(){
        //リクエストパラメータの取得
        $this->request['get'] = $_GET;
        $this->request['post'] = $_POST;
        //モデルオブジェクト作成
        $this->Time = new Time;
    }

    public function time(){
        $time = $this->Time->resistTime();

        return $time;

    }

    public function shift(){
        $time = $this->Time->getAll();

        return $time;
    }
}

?>