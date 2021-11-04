<?php
session_start();
// XSS対策機能
function h($s) {
  return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}

// ダイレクアクセス禁止
require_once(ROOT_PATH .'/Models/Main/Ban.php');
Ban();
// コントローラ取得
require_once(ROOT_PATH .'/Controllers/Main/UsersController.php');
$users = new UsersController;
// ユーザーデータ取得
$user = $users->views();
require_once(ROOT_PATH .'/Models/Main/Member/Image.php');

//バリデーション取得
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  require_once(ROOT_PATH .'/Models/Main/Member/Validation.php');
  $validation =  new Validation;
  $errors = $validation->getErrors();
}
//userデータへの変更機能
if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($errors)) {
  $update = $users->update();
  header('Location: ../Main/main.php');
  exit();
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
    <link rel="stylesheet" href="/css/Main/Member/edit.css">
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    <title>Lesson Reservation - 編集</title>
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
            <h1>編集</h1>
          </div>
          <div id="box"></div>
        </div>
        <div id="main-wrapp">
         
           <div id="main-box">
              <div id="resist-text">
                <p>会員情報を編集される方はこちらから編集してください。</p>
                <p><font color="red">*</font>は必須項目となりますので必ず入力してください。</p>
              </div>
        <form action="" method="POST" enctype="multipart/form-data" novalidate>
              <div id="image-box">
                  <img id="image"  src="<?= get_image(); ?>" alt="画像">  
              </div> 
            
              <div id="upload">
              <input id="pre" type="file" name="image" accept="image/*"  onchange="previewImage(this);"require>
              </div> 

             <div class="input-box">
              <p class="text-name">氏名：<font color="red">*</font></p>
              <?php if (isset($errors['name'])): ?>
                <p class="alert"><?= $errors['name']; ?></p>
               <?php endif; ?>
              <input class="text-box" type="text" name="name" 
              value="<?= h($user['name']);?>"required>
             </div>

             <div class="input-box">
              <p class="text-name">フリガナ：<font color="red">*</font></p>
              <?php if (isset($errors['kana'])): ?>
                <p class="alert"><?= $errors['name']; ?></p>
               <?php endif; ?>
              <input class="text-box" type="text" name="kana"
              value="<?= h($user['kana']);?>"required>
             </div>

             <div class="input-box">
              <p class="text-name">メールアドレス：<font color="red">*</font></p>
              <?php if (isset($errors['email'])): ?>
                <p class="alert"><?= $errors['email']; ?></p>
               <?php endif; ?>
              <input class="text-box" type="text" name="email" 
              value="<?= h($user['email']);?>"required>
             </div>

             <div class="input-box">
              <p class="text-name">電話番号：</p>
              <?php if (isset($errors['tel'])): ?>
                <p class="alert"><?= $errors['tel']; ?></p>
               <?php endif; ?>
              <input class="text-box" type="text" name="tel"
              value="<?= h($user['tel']);?>"required>
             </div>



             <div class="input-box">
              <p class="text-name">郵便番号：<font color="red">*</font></p>
              <?php if (isset($errors['code'])): ?>
                <p class="alert"><?= $errors['code']; ?></p>
               <?php endif; ?>
              <input class="text-box" type="text" name="code" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');" 
              value="<?= h($user['code']);?>"required　>
             </div>
             


             <div class="input-box">
              <p class="text-name">住所：<font color="red">*</font></p>
                <?php if (isset($errors['address'])): ?>
                 <p class="alert"><?= $errors['address']; ?></p>
                <?php endif; ?>
              <input class="text-box" type="text" name="address" 
              value="<?= h($user['address']);?>"
              required>
             </div>
             

             <div class="input-box">
              <p class="text-name">担当楽器：<font color="red">*</font></p>
              <select class="text-box" name="inst" id="">
                <?php
                 require_once(ROOT_PATH .'/Models/Main/Member/Select.php');
                 DefaultInst();
                 SelectInst();
                ?>
              </select>
             </div>

             <div id="etc-box">
              <p id="etc-name" >備考欄：</p>
              <textarea name="body" id="etc" required><?= h($user['body']);?></textarea>
             </div>

             
             
             <div id="button">
              <input id="resist" type="submit" value="確認">
              <button type="button" id="reverse" onclick="location.href='../Main/main.php'">戻る</button>
             </div>
           </div>
        </form>
        </div>
    </main>
    <footer>
     <?php require(ROOT_PATH .'/Views/Main/footer.php'); ?>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="/js/Main/edit.js"></script>
</body>
</html>