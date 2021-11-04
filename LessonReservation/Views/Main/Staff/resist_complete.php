<?php
session_start();
//ダイレクトアクセス禁止


require(ROOT_PATH .'/Models/Main/Staff/Resist/Ban_complete.php');
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/Main/Staff/complete.css">
    <title>Lesson Reservstion - ログイン</title>
</head>
<body>
    <header>
     <?php require(ROOT_PATH .'/Views/Main/header.php'); ?>
    </header>

    <main>
        <div id="tittle-wrapp">
          <div id="logo-box">
            <img id="logo" src="/img/lesson/logo1.png" alt="">
          </div>
          <div id="text">
            <h1>登録完了</h1>
          </div>
          <div id="box"></div>
        </div>
        <div id="main-wrapp">
           <div id="main-box">
               <div id="comp-text">
                <p>登録が完了しました。</p>
                <p>登録していただいたメールアドレスに登録完了のメールが届きますので
                    ご確認お願いいたします。
                </p>
                <p>ログインページからご登録していただいた
                    メールアドレス、パスワードを入力してログインしてください。</p>
               </div>
              <div id="link">
              <a href="../Main/main.php">メインページへ戻る</a>
             </div>
             </div>
           </div>
         </form>
        </div>
    </main>

    <footer>
     <?php require(ROOT_PATH .'/Views/Main/footer.php'); ?>
    </footer>
</body>
</html>