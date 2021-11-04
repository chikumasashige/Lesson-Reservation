<?php
require_once(ROOT_PATH .'Models/Db.php');

class Instrument extends Db{


    private $table= 'instrument';
    public function __construct($dbh = null){
        parent::__construct($dbh);
    }

    /** 
    * instrumentテーブルから全データを取得
    * @return Array $errors バリデーション
    */

    public function getInst():Array{

        $sql = "SELECT * 
        FROM $this->table
        ORDER BY id";

        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

?>