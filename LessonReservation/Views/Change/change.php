<?php
session_start();
//ダイレクトアクセス禁止機能
require_once(ROOT_PATH .'/Models/Change/Ban.php');

require_once(ROOT_PATH .'/Controllers/Change/ChangeController.php');

$change = new ChangeController;

// バリデーション機能
$errors  = $change->passVali();


if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($errors)) { 

//パスワード変更
$pass = $change->change();
//change_complete.phpへのアクセス機能
$access = $change->complete();

}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/Change/change.css">
    <title>Lesson Reservstion - パスワードリセット</title>
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
            <h1>パスワードリセット</h1>
          </div>
          <div id="box"></div>
        </div>
        <div id="main-wrapp">
         <form action="" method="POST" novalidate>
           <div id="change-box">
           　　<div id="change-text">
                <p>新しいパスワードを入力してください。</p>
            　</div>

             <div class="input-box">
              <p class="text-name">パスワード：</p>
              <?php if (isset($errors['password'])): ?>
               <p class="alert"><?= $errors['password']; ?></p>
              <?php endif; ?>
              <input class="text-box" type="password" name="password" value="" required>
             </div>

             <div class="input-box">
              <p class="text-name">確認用パスワード：</p>
              <?php if (isset($errors['confirm'])): ?>
               <p class="alert"><?= $errors['confirm']; ?></p>
              <?php endif; ?>
              <input class="text-box" type="password" name="confirm" value="" required>
             </div>

               <input id="change" type="submit" value="変更">

             <div id="link">
               <a href="/Login/login.php">ログインページへ戻る</a>
             </div>

             </div>
           </div>
         </form>
        </div>
    </main>

    <footer>
     <?php require(ROOT_PATH .'/Views/Login/footer.php'); ?>
    </footer>
</body>
</html>