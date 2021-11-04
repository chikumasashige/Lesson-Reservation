<?php
require_once(ROOT_PATH .'/Models/Db.php');
class Send extends Db{
    
    public function __construct($dbh = null){
        parent::__construct($dbh);
    }

    /** 
    * usersテーブルからメールの重複を確認
    * 
    */
    public function sendMail(){


        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
          // メールアドレス重複している場合

          $email = $_POST['email'];

          $sql = "SELECT COUNT(email) 
          FROM users
          WHERE email=:email
          GROUP BY email";
    
          $sth = $this->dbh->prepare($sql);
          $sth->bindParam(':email',$email,PDO::PARAM_STR);
          $sth->execute();
          $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  
          foreach($result as $val){
            if($val>1){
              print_r($val);
                mb_language("Japanese");
                mb_internal_encoding("UTF-8");

                $to = $_POST['email'];
                $title = 'お問い合わせいただきありがとうございます。';
                $content = 
                '※このメールはシステムからの自動返信です。'
                ."\n"."\n"
                ."\n".'このメールはパスワードを変更していただくために送信させていただいたメールになります。'
                ."\n".'身に覚えの無いメールの場合はこのメールを破棄してください。'
                ."\n"."\n"
                ."\n".'以下の作業は1時間以内に作業を行なっていただきます。'
                ."\n".'下記のURLにアクセスしていただきパスワードの変更の手続きをお願いいたします。'
                ."\n"."\n"
                .'http://localhost/Change/change.php'
                ."\n".'1時間以上過ぎてしまった場合はURLにアクセス出来なくなるため、'
                ."\n".'再度WEBからパスワード変更のメールを送信してください。'
                ."\n";
                
                 
                
                $result = mb_send_mail($to, $title, $content);
              
            }
          }
      }
    }
    

}
?>