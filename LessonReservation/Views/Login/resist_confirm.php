<?php
session_start();

//ダイレクトアクセス禁止
require(ROOT_PATH .'/Models/Login/Resist/Ban_confirm.php');

//画像取り込み
require(ROOT_PATH .'/Models/Login/Resist/Image.php');

//モデルコントローラー
require_once(ROOT_PATH .'/Controllers/Login/ResistControllers.php');
$resist = new ResistController;
// 楽器選択機能
$inst = $resist->inst();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  // メール送信機能
  require_once(ROOT_PATH .'/Models/Login/Resist/Send.php');
  //登録機能
  $complete = $resist->resist();
  //flg取得機能
  $comp= $resist->complete();
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
    <link rel="stylesheet" href="/css/Login/confirm.css">
    <title>Lesson Reservation - 新規登録</title>
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
            <h1>登録内容確認</h1>
          </div>
          <div id="box"></div>
        </div>
        <div id="main-wrapp">
         <form action="" method="POST" novalidate>

           <div id="main-box">



             <div id="image-box">

                 <img  id="image"  src="<?= get_image(); ?>" 
                 
                 
                 style="width:150px;heigt:130px; object-fit: cover;">
             
             </div>
             <div class="input-box">
              <p class="text-name">氏名：</p>
              <h3 class="post" ><?= $name?></h3>
             </div>

             <div class="input-box">
              <p class="text-name">フリガナ：</p>
              <h3 class="post" ><?= $kana?></h3>
              
             </div>

             <div class="input-box">
              <p class="text-name">メールアドレス：</p>
              <h3 class="post" ><?= $email?></h3>
              
             </div>

             <div class="input-box">
              <p class="text-name">電話番号：</p>
              <h3 class="post" ><?= $tel?></h3>
              
             </div>
             <div class="input-box">
              <p class="text-name">郵便番号：</p>
              <h3 class="post" ><?= $code ?></h3>
              
             </div>
             <div class="input-box">
              <p class="text-name">住所：</p>
              <h3 class="post" ><?= $address ?></h3>
              
             </div>
   
             
             <div class="input-box">
              <p class="text-name">担当楽器：</p>
              <h3 class="post" >
                <?php
                require(ROOT_PATH .'/Models/Login/Resist/Select.php');
                ConfirmInst();
                ?>
              </h3>
             </div>

             <div id="etc-box">
              <p id="etc-name" >備考欄：</p>
              <h3 class="post" ><?=  nl2br($body)?></h3>
             </div>

             
            <form  method="POST" novalidate>
             <div id="button">
            
              <input id="complete" name="submit" type="submit" value="登録">
            
              <button type="button" id="reverse" onclick="history.back()">戻る</button>
             </div>

            </form>
           </div>
         </form>
        </div>
    </main>
    <footer>
     <?php require(ROOT_PATH .'/Views/Login/footer.php'); ?>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="/js/Login/resist.js"></script>
</body>
</html>