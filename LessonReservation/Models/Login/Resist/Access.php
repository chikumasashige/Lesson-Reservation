<?php
class Access {
    public function AccessSite(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($errors)) {
            // フラグ
            $flg = mt_rand(1,99999);

            if(isset($_FILES['image']['name'])){
               // 画像
               $image = $_FILES['image']['name'];
               //画像を保存
               move_uploaded_file($_FILES['image']['tmp_name'], './img/user/' . $image);
               $_SESSION['image'] = $image;
            }
               


            

            //氏名
            $name = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $post_name = htmlspecialchars($name['name'], ENT_QUOTES, "UTF-8");
            
            // フリガナ
            $post_nickname = htmlspecialchars($name['kana'], ENT_QUOTES, "UTF-8");
            
            // メールアドレス
            $post_mail = htmlspecialchars($_POST['email'], ENT_QUOTES, "UTF-8");
            
            // 電話番号
            $post_number = htmlspecialchars($_POST['tel'], ENT_QUOTES, "UTF-8");
            
            // 郵便番号
            $post_code = htmlspecialchars($_POST['code'], ENT_QUOTES, "UTF-8");
            
            // 住所
            $post_address = htmlspecialchars($_POST['address'], ENT_QUOTES, "UTF-8");


            // パスワード
            $pass = htmlspecialchars($_POST['password'], ENT_QUOTES, "UTF-8");

            // 担当楽器
            $inst = htmlspecialchars($_POST['inst'], ENT_QUOTES, "UTF-8");


            //備考欄
            $body = htmlspecialchars($_POST['body'], ENT_QUOTES, "UTF-8");


 

            $_SESSION['flg'] =  $flg;
            $_SESSION['name'] = $post_name; 
            $_SESSION['kana'] = $post_nickname; 
            $_SESSION['email'] = $post_mail; 
            $_SESSION['tel'] = $post_number; 
            $_SESSION['code'] = $post_code; 
            $_SESSION['address'] = $post_address; 
            $_SESSION['password'] = $pass; 
            $_SESSION['inst'] = $inst;
            $_SESSION['body'] = $body;
            header('Location: resist_confirm.php');
            exit();
        }
    }


}

?>