<?php
require_once(ROOT_PATH . '/Models/Db.php');


class Change extends Db{
    public function __construct($dbh = null){
        parent::__construct($dbh);
    }

    public function ChangePass(){

     if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['email'])) {
       //メールアドレス
       $email = $_SESSION['email'];
       // パスワード
       $password = htmlspecialchars($_POST['password'], ENT_QUOTES, "UTF-8");
       $hash = password_hash($password,PASSWORD_DEFAULT);

   
       $sql = "UPDATE users 
           SET password = :password
           WHERE email = '".$email."'";
       $sth = $this->dbh->prepare($sql);
       
       $this->dbh->beginTransaction();
       try{
        $sth->bindParam(':password',$hash,PDO::PARAM_STR);
        
        $sth->execute();

        $this->dbh->commit();

        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;


       }catch(PDOException $e){
        echo '更新失敗'.$e->getMessage();
        $this->dbh->rollBack();
        exit();
       }
     }elseif($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_SESSION['email'])){

        header('Location: /Login/login.php');
        exit();
     }
         


    }

}


?>