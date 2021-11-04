<?php
require_once(ROOT_PATH .'/Models/Db.php');

class Insts extends Db{
    private $table='instrument';

    public function __construct($dbh=null){
        parent::__construct($dbh);
    }


    /**
     * instrumentテーブルから全データを取得
     * @return $result instrumentデータ取得
     */

     public function allInst():Array{
         $sql = "SELECT * FROM $this->table
         ORDER BY id";
         $sth = $this->dbh->prepare($sql);
         $sth->execute();
         $result = $sth->fetchAll(PDO::FETCH_ASSOC);
         return $result;
     }
}
?>