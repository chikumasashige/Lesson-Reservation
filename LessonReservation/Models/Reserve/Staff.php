<?php
require_once(ROOT_PATH .'/Models/Db.php');

class Staff extends Db{

    private $table='staff';

    public function __construct($dbh=null){
        parent::__construct($dbh);
    }


    /** 
     * staffテーブルからデータを取得
     * @return $result 該当のstaffデータ取得
    */
    public function findAll(){

        $user_inst = $_GET['inst_id'];
        $sql = "SELECT * FROM staff s
        WHERE s.inst_id = $user_inst
        AND del_flg = 0";

        $sth = $this->dbh->prepare($sql);

        $sth->execute();

        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        return $result;


    }
}