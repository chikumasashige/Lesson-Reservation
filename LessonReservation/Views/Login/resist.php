<?php
session_start();

// XSS対策機能
function h($s) {
  return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}
require_once(ROOT_PATH .'/Controllers/Login/ResistControllers.php');

$resist = new ResistController;




// 楽器選択機能
$inst = $resist->inst();

// バリデーション
$errors = $resist->validate();


//resist_comfirm.phpへのアクセス機能
if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($errors)) {
  $access = $resist->access();
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
    <link rel="stylesheet" href="/css/Login/resist.css">
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
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
            <h1>新規登録</h1>
          </div>
          <div id="box"></div>
        </div>
        <div id="main-wrapp">
         
           <div id="main-box">
              <div id="resist-text">
                <p>こちらに必要な情報を入力してください。</p>
                <p><font color="red">*</font>は必須項目となりますので必ず入力してください。</p>
              </div>
            <form action="" method="POST" enctype="multipart/form-data" novalidate>
              <div id="image-box">

                  <img  src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" 
                  alt onerror="this.onerror = null; this.src='';"　style="width:150px;heigt:130px; object-fit: cover;">
                  <img id="image"  src="/img/lesson/default.png" alt="画像">
  
                  
              </div> 
            
              <div id="upload">
               <input id="pre" type="file" name="image" accept="image/*" onchange="previewImage(this);">
              </div> 

             <div class="input-box">
              <p class="text-name">氏名：<font color="red">*</font></p>
               <?php if (isset($errors['name'])): ?>
                <p class="alert"><?= $errors['name']; ?></p>
               <?php endif; ?>
              <input class="text-box" type="text" name="name" placeholder="山田太郎" 


               <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                 value =  "<?= h($_POST['name'])?>"
               <?php endif; ?> 


              required>
             </div>

             <div class="input-box">
              <p class="text-name">フリガナ：<font color="red">*</font></p>
               <?php if (isset($errors['kana'])): ?>
                <p class="alert"><?= $errors['kana']; ?></p>
               <?php endif; ?>
              <input class="text-box" type="text" name="kana" placeholder="ヤマダタロウ" 

               <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                 value =  "<?= h($_POST['kana'])?>"
               <?php endif; ?> 
              
              
              required>
             </div>

             <div class="input-box">
              <p class="text-name">メールアドレス：<font color="red">*</font></p>
               <?php if (isset($errors['email'])): ?>
                <p class="alert"><?= $errors['email']; ?></p>
               <?php endif; ?>
              <input class="text-box" type="text" name="email" placeholder="test@co.jp"  
              
               <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                 value =  "<?= h($_POST['email'])?>"
               <?php endif; ?> 
              
              
              
              required>
             </div>

             <div class="input-box">
              <p class="text-name">電話番号：</p>
               <?php if (isset($errors['tel'])): ?>
                <p class="alert"><?= $errors['tel']; ?></p>
               <?php endif; ?>
              <input class="text-box" type="text" name="tel" placeholder="08012345678" 
              
               <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                   value =  "<?= h($_POST['tel'])?>"
               <?php endif; ?> 
      

              required>
             </div>



             <div class="input-box">
              <p class="text-name">郵便番号：<font color="red">*</font></p>
                <?php if (isset($errors['code'])): ?>
                 <p class="alert"><?= $errors['code']; ?></p>
                <?php endif; ?>
              <input class="text-box" type="text" name="code" placeholder="1234567"  onKeyUp="AjaxZip3.zip2addr(this,'','address','address');"
               
                <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                  value =  "<?= h($_POST['code'])?>"
                <?php endif; ?> 
              
          
              required　>
             </div>
             


             <div class="input-box">
              <p class="text-name">住所：<font color="red">*</font></p>
                <?php if (isset($errors['address'])): ?>
                 <p class="alert"><?= $errors['address']; ?></p>
                <?php endif; ?>
              <input class="text-box" type="text" name="address" placeholder="東京都渋谷区1-2-1" 
              
                <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                  value =  "<?= h($_POST['address'])?>"
                <?php endif; ?> 
              
              
              required>
             </div>
             


             <div class="input-box">
              <p class="text-name">パスワード：<font color="red">*</font></p>
              <?php if (isset($errors['password'])): ?>
               <p class="alert"><?= $errors['password']; ?></p>
              <?php endif; ?>
              <input class="text-box" type="password" name="password"  required>
             </div>



             <div class="input-box">
              <p class="text-name">確認用パスワード：<font color="red">*</font></p>
              <?php if (isset($errors['confirm'])): ?>
               <p class="alert"><?= $errors['confirm']; ?></p>
              <?php endif; ?>
              <input class="text-box" type="password" name="confirm"  value="" required>
             </div>



             <div class="input-box">
              <p class="text-name">担当楽器：<font color="red">*</font></p>
              <?php if (isset($errors['inst'])): ?>
               <p class="alert"><?= $errors['inst']; ?></p>
              <?php endif; ?>
              <select class="text-box" name="inst" id="">


                <?php
                  require(ROOT_PATH .'/Models/Login/Resist/Select.php');
                 DefaultInst();
                 SelectInst();
                ?>

              </select>
             </div>

             <div id="etc-box">
              <p id="etc-name" >備考欄：</p>
              <textarea name="body" id="etc" required><?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?><?= h($_POST['body'])?><?php endif; ?></textarea>
             </div>

             
             
             <div id="button">
              <input id="resist" type="submit" value="確認">
              <button type="button" id="reverse" onclick="location.href='login.php'">戻る</button>
             </div>
            </form>
           </div>
        
        </div>
    </main>
    <footer>
     <?php require(ROOT_PATH .'/Views/Login/footer.php'); ?>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="/js/Login/resist.js"></script>
</body>
</html>