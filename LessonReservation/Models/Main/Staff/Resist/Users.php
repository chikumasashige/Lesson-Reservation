<?php
require_once(ROOT_PATH . '/Models/Db.php');


class Users extends Db{
    private $table = 'users';
    public function __construct($dbh = null){
        parent::__construct($dbh);
    }


    /** 
    * playersテーブルから指定idに一致するデータを取得
    * @param integer $id 選手のID 
    * @return Array $result 指定の選手データ
    */
    
    public function getUsers():Array{
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($errors)) {

            $email = htmlspecialchars($_POST['email'], ENT_QUOTES, "UTF-8");
            $password = htmlspecialchars($_POST['password'], ENT_QUOTES, "UTF-8");
            $hash = password_hash($password,PASSWORD_DEFAULT);

            $sql = 'SELECT * FROM users '.$this->table;
            $sth = $this->dbh->prepare($sql);
            $sth->execute();
            $result = $sth->fetchALL(PDO::FETCH_ASSOC);
            return $result;



        }

    }
}