<?php
class Access{
    //mail_complete.phpへのアクセス機能
    public function AccessSite(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($errors)) {
            // フラグ
            $flg = mt_rand(1,99999);

            // メールアドレス
            $post_mail = htmlspecialchars($_POST['email'], ENT_QUOTES, "UTF-8");

            $_SESSION['email'] = $post_mail;
            $_SESSION['flg'] =  $flg;
            
            header('Location: mail_complete.php');
            exit();
            
            header('Location: cahnge.php');
            exit();
        }
    }
    //change_complete.phpへのアクセス機能
    public function ChangeComplete(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($errors)) {
            // フラグ
            $flg = mt_rand(1,99999);
            $_SESSION['flg'] =  $flg;
            unset($_SESSION['email']);
            
            header('Location: change_complete.php');
            exit();
        }
    }

}

?>