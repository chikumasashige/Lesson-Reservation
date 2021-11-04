<?php 
session_start();


require_once(ROOT_PATH .'/Controllers/Change/ChangeController.php');

$change = new ChangeController;
// バリデーション機能
$errors  = $change->validation();


if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($errors)) {

//メール送信機能
$send = $change->send(); 
//mail_complete.phpへのアクセス機能
$access = $change->access();


 
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
    <link rel="stylesheet" href="/css/Change/mail.css">
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
            <h1>メール送信</h1>
          </div>
          <div id="box"></div>
        </div>
        <div id="main-wrapp">
         <form action="" method="POST" novalidate>
           <div id="main-box">
           　　<div id="mail-text">
                <p>登録されているメールアドレスにパスワード変更用のURLが記載されているメールを送信します。</p>
                <p>登録されているメールアドレスを入力してください。</p>
                
            　 </div>

             <div class="input-box">

               <p class="text-name">メールアドレス：</p>
              <?php if (isset($errors['email'])): ?>
               <p class="alert"><?= $errors['email']; ?></p>
              <?php endif; ?>
               <input class="text-box" type="text" name="email" placeholder="test@co.jp" value="" required>
              
             </div>

              <div id="button">
               <input id="submit" type="submit" value="送信">
               <button type="button" id="reverse" onclick="location.href='/Login/login.php'">戻る</button>
              </div>
             </div>
           </div>
         </form>
        </div>
    </main>

    <footer>
     <?php require(ROOT_PATH .'/Views/Login/footer.php'); ?>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="/js/Change/change.js"></script>
</body>
</html>