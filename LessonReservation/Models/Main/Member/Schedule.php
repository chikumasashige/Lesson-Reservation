<?php
require_once(ROOT_PATH .'/Models/Db.php');

class Times extends Db{
    private $table='time';

    public function __construct($dbh=null){
        parent::__construct($dbh);
    }


    /** 
     * timeテーブルからデータを取得
     * @return $result 該当のtimeデータ取得
    */
    public function ScheduleCheck(){
        $user_id = $_GET['users'];
        $sql = "SELECT * FROM time
        WHERE users_id = '".$user_id."'
        ORDER BY day_shift";

        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        
    }

    /** 
    * timeテーブルから全データを取得
    * @return Array $result 削除するデータ
    */

    public function CancelSchedule($id=0){
        $sql = "DELETE FROM $this->table 
        WHERE id = :id";
        $sth = $this->dbh->prepare($sql);
        $this->dbh->beginTransaction();

        try{
            $sth->bindParam(':id', $id, PDO::PARAM_INT);
            $sth->execute();

            
            $this->dbh->commit();

            $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        }catch(PDOException $e){
            echo '削除失敗'.$e->getMessage();
            $this->dbh->rollBack();
            exit();
        }



    }




}
?>