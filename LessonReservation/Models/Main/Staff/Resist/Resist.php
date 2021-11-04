<?php
require_once(ROOT_PATH .'/Models/Db.php');
class Resist extends Db{
    private $table='users';

    public function __construct($dbh=null){
        parent::__construct($dbh);
    }

    /** 
     * @return $result 登録するcontactsデータ
    */
    public function ResistUser(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            // 画像
            if(!empty($_SESSION['image'])){

                $image = $_SESSION['image'];
              }elseif(empty($_SESSION['image'])){
                $image= 'default.png';
            }
            //氏名
            $name=$_SESSION['name'];

            // フリガナ
            $kana = $_SESSION['kana'];

            //メールアドレス
            $email = $_SESSION['email'];

            //電話番号
            $tel = $_SESSION['tel'];

            //郵便番号
            $code = $_SESSION['code'];

            // 住所
            $address = $_SESSION['address'];

            // パスワード
            $pass = $_SESSION['password'];
            $hash = password_hash($pass,PASSWORD_DEFAULT);

            // 楽器
            $inst = $_SESSION['inst'];

            // 備考欄
            $body =  $_SESSION['body'];

            //登録日
            $created_at = date('Y-m-d H:i:s');

            //更新日
            $update_at = date('Y-m-d H:i:s');



            $sql = "INSERT INTO staff(image, name, kana , email, tel, code, address, password, inst_id, body, created_at, update_at)
            VALUES(:image, :name, :kana, :email, :tel, :code, :address, :password, :inst_id, :body, :created_at, :update_at)";


            $sth = $this->dbh->prepare($sql);

            $this->dbh->beginTransaction();

            try{
                $sth->bindParam(':image',$image ,PDO::PARAM_STR);
                $sth->bindParam(':name',$name ,PDO::PARAM_STR);
                $sth->bindParam(':kana',$kana,PDO::PARAM_STR);
                $sth->bindParam(':email',$email,PDO::PARAM_STR);
                $sth->bindParam(':tel',$tel,PDO::PARAM_STR);
                $sth->bindParam(':code',$code,PDO::PARAM_STR);
                $sth->bindParam(':address',$address,PDO::PARAM_STR);
                $sth->bindParam(':password',$hash,PDO::PARAM_STR);
                $sth->bindParam(':inst_id',$inst,PDO::PARAM_INT);
                $sth->bindParam(':body',$body,PDO::PARAM_STR);
                $sth->bindParam(':created_at',$created_at,PDO::PARAM_STR);
                $sth->bindParam(':update_at',$update_at,PDO::PARAM_STR);

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
    }

    





}


?>