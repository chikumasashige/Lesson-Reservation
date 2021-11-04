<?php

function AccesssLogin(){
    // usersデータ取得
    require_once(ROOT_PATH .'/Controllers/Login/ResistControllers.php');
    $resist = new ResistController;
    $users = $resist->users();
    //メールアドレス
    $email = $_POST['email'];
    //パスワード
    $password = htmlspecialchars($_POST['password'], ENT_QUOTES, "UTF-8");
    foreach($users as $key ){
      if($email == $key['email'] && password_verify($password,$key['password'])){
          $id = $key['id'];
          $email = $key['email'];
          $flg = mt_rand(1,99999);

          $_SESSION['id'] = $id;
          $_SESSION['email'] = $email;
          $_SESSION['flg'] = $flg;

          header('Location: /Main/Main/main.php');
          exit();
      }
    }

}
?>