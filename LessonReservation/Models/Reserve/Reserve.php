<?php
require_once(ROOT_PATH .'/Models/Db.php');

class Time extends Db{

    private $table='time';

    public function __construct($dbh=null){
        parent::__construct($dbh);
    }


    /** 
     * staffテーブルからデータを取得
     * @return $result 該当のstaffデータ取得
    */
    public function resistTime(){
        // スタッフID
        $staff = $_POST['staff_id'];
        // ユーザーID
        $users = $_POST['users_id'];
        //時間
        $time = $_POST['time'];
        $shift = $_POST['shift'];
        // $time_shift = $time.$shift;
        //登録日
        $created_at = date('Y-m-d H:i:s');
        $sql = "INSERT INTO time(users_id, staff_id, day_shift, time_shift, created_at)
        VALUES(:users_id, :staff_id, :day_shift, :time_shift, :created_at)";


        $sth = $this->dbh->prepare($sql);

        $this->dbh->beginTransaction();

        try{
          $sth->bindParam(':users_id',$users ,PDO::PARAM_INT);
          $sth->bindParam(':staff_id',$staff ,PDO::PARAM_INT);
          $sth->bindParam(':day_shift',$time,PDO::PARAM_STR);
          $sth->bindParam(':time_shift',$shift,PDO::PARAM_STR);
          $sth->bindParam(':created_at',$created_at,PDO::PARAM_STR);
          $sth->execute();

          $this->dbh->commit();

          $result = $sth->fetchAll(PDO::FETCH_ASSOC);
          return $result;

        }catch(PDOException $e){
            echo '登録失敗'.$e->getMessage();
            $this->dbh->rollBack();
            exit();
        }
    }

    public function getAll(){
        $staff_id = $_GET['staff_id'];
        $sql = "SELECT * FROM time 
        WHERE staff_id = '".$staff_id."'";

        $sth = $this->dbh->prepare($sql);

        $sth->execute();

        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    }
}