<?php
require_once(ROOT_PATH .'/Models/Db.php');

class Validation extends Db{
    
    public function __construct($dbh = null){
        parent::__construct($dbh);
    }

    /** 
    * usersテーブルから全データを取得
    * @return Array $errors バリデーション
    */

    public function getErrors():Array{
        $errors = [];


        // メールアドレス
        $post_mail = htmlspecialchars($_POST['email'], ENT_QUOTES, "UTF-8");
        $pattern = "/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9._-]+)+$/";
        if (empty($post_mail)) {
            $errors['email'] = "＊メールアドレスは必ず入力して下さい。";
          }elseif(!preg_match($pattern,$post_mail)) {
            $errors['email'] = "＊不正な形式のメールアドレスです。";
        }


        return $errors;
    }

    public function passErrors():Array{
        $errors = [];
         // パスワード
         $pass = htmlspecialchars($_POST['password'], ENT_QUOTES, "UTF-8");

         if (empty($pass)) {
            $errors['password'] = "＊パスワードは必ず入力して下さい。";
          }elseif(!preg_match("/^.*((?=.*[A-Za-z])(?=.*[0-9]){8,24}|(?=.*[A-Za-z])(?=.*[!_@]){8,24}|(?=.*[0-9])(?=.*[!_@])){8,24}.*$/",$pass)){
           $errors['password'] = '＊半角英数字または記号（「!_@」のみ）で入力してください。文字は8文字以上24字以上で入力してください。';
         }

         //確認用パスワード
         $confirm = htmlspecialchars($_POST['confirm'], ENT_QUOTES, "UTF-8");
         if ($pass !== $confirm){
            $errors['confirm'] = "＊パスワードが一致しません。";
          }

         return $errors;
    }
}


?>