<?php
class Validation{

    /** 
    * usersテーブルから全データを取得
    * @return Array $errors バリデーション
    */

    public function getErrors():Array{
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         $name = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
         $post_name = htmlspecialchars($name['name'], ENT_QUOTES, "UTF-8");
         // 氏名
         if (empty($post_name)) {
             $errors['name'] = '＊氏名は必ず入力して下さい。';
          }
          
          if(mb_strlen($post_name) >= 10){
              $errors['name'] = '＊氏名は10文字以内で入力してください。';
          }


          // フリガナ
         $post_nickname = htmlspecialchars($name['kana'], ENT_QUOTES, "UTF-8");
         if (empty($post_nickname)) {
           $errors['kana'] = '＊フリガナは必ず入力して下さい。';
          }elseif(!preg_match("/^[ァ-ヾ]+$/u",$post_nickname)){
            $errors['kana'] = '＊カタカナのみで必ず入力して下さい。';
          }elseif(mb_strlen($post_nickname) >= 10){
            $errors['kana'] = '＊フリガナは10文字以内で入力してください。';
         }


          // メールアドレス
          $post_mail = htmlspecialchars($_POST['email'], ENT_QUOTES, "UTF-8");
          $pattern = "/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9._-]+)+$/";
          if (empty($post_mail)) {
              $errors['email'] = "＊メールアドレスは必ず入力して下さい。";
            }elseif(!preg_match($pattern,$post_mail)) {
              $errors['email'] = "＊不正な形式のメールアドレスです。";
          }
 

          // 電話番号
         $post_number = htmlspecialchars($_POST['tel'], ENT_QUOTES, "UTF-8");
         if(empty($post_number)){
         
           }elseif(!preg_match('/^(0{1}\d{9,10})$/', $post_number)) {
             $errors['tel'] = '＊電話番号は0-9までの数字を10桁または11桁で入力してください。';
         }


          // 郵便番号
         $post_code = htmlspecialchars($_POST['code'], ENT_QUOTES, "UTF-8");
         if(empty($post_code)){
            $errors['code'] = '＊郵便番号は必ず入力してください。。';
           }elseif(!preg_match('/^[0-9]{7}$/', $post_code)) {
             $errors['code'] = '＊郵便番号は0-9までの数字を7桁で入力してください。';
         }


          // 住所
          $post_address = htmlspecialchars($_POST['address'], ENT_QUOTES, "UTF-8");
          if(empty($post_code)){
             $errors['address'] = '＊住所は必ず入力してください。。';
          }


          return $errors;
        }

        
    }

}

?>