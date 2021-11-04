<?php
session_start();
require_once(ROOT_PATH .'/Controllers/Login/ResistControllers.php');

$resist = new ResistController;
// バリデーション 機能

$errors = $resist->loginvali();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($errors)) {

//ログイン機能
require_once(ROOT_PATH .'/Models/Login/Login.php');
AccesssLogin();
}


//Googleボタン機能
require(ROOT_PATH .'Models/Google/Gconfig.php');
$google_login_btn = '<a href="'.$google_client->createAuthUrl().'"><img id="photo" src="/img/lesson/google.png" /></a>';

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="google-signin-client_id" content="679164529687-1p8vmu73shqvrn173onh2e8sql37av4b.apps.googleusercontent.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/Login/login.css">
    <title>Lesson Reservstion - ログイン</title>
</head>
<body>
    <header>
     <?php require(ROOT_PATH .'/Views/Login/header.php'); ?>
    </header>

    <main>
        <div id="tittle-wrapp">
          <div id="logo-box">
            <img id="logo" src="/img/lesson/logo1.png" alt="">
          </div>
          <div id="text">
            <h1>ログイン</h1>
          </div>
          <div id="box"></div>
        </div>
        <div id="main-wrapp">
         <form action="" method="POST" novalidate>
           <div id="main-box">
             <div class="input-box">
              <p class="text-name">メールアドレス：</p>
              <?php if (isset($errors['email'])): ?>
                <p class="alert"><?= $errors['email']; ?></p>
               <?php endif; ?>
              <input class="text-box" type="text" name="email" placeholder="メールアドレス" value="" require>
             </div>
             <div class="input-box">
              <p class="text-name">パスワード：</p>
              <?php if (isset($errors['password'])): ?>
               <p class="alert"><?= $errors['password']; ?></p>
              <?php endif; ?>
              <input class="text-box" type="password" name="password" placeholder="パスワード" value="" require>
              <div id="link">
              <a href="/Change/mail.php">パスワードを忘れた方はこちらから</a>
             </div>
              <input id="submit" type="submit" value="ログイン">
              <?php
               echo '<div id="google" align="center">'.$google_login_btn . '</div>';
              ?>
             </div>
           </div>
         </form>
        </div>
        <div id="new-resist">
         <a href="/Login/resist.php">新規登録</a>
        </div>
    </main>

    <footer>
     <?php require(ROOT_PATH .'/Views/Login/footer.php'); ?>
    </footer>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="/js/Login/login.js"></script>

</body>
</html>