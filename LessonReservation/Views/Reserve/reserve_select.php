<?php
session_start();
require_once(ROOT_PATH .'/Controllers/Reserve/StaffController.php');

$staff = new StaffController;

$instructor = $staff->staff();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/Reserve/reserve_select.css">
    <title>Lesson Resrvation -　講師選択画面</title>
</head>
<body>
    <header>
           <?php require(ROOT_PATH .'/Views/Reserve/header.php'); ?>
    </header>
    <main>
         <div id="main-wrapp1">
            <div id="tittle-wrapp1">
             <div id="logo-box1">
               <img id="logo1" src="/img/lesson/logo1.png">
             </div>
             <div id="text1">
               <h1>講師選択</h1>
             </div>
             <div id="box"></div>
            </div>

            <div class="manage-wrapp">
                <div class="manage-box">
                     <?php foreach($instructor as $key):?>
                        <div class="members-box">
                         <div class="image-box">
                        
                          <img class="mambers-img" src="/img/staff/<?= $key['image'] ?>" alt="">
                         </div>
   
                         <div class="manage-text">
 
                          <div class="profile-box">
                           <p class="profile-name">講師名:</p>
                           <p><?= $key['name'] ?></p>
                          </div>
 
                          <div class="profile-box">
                           <p class="profile-name">経歴:</p>
                           <p><?= nl2br($key['body']) ?></p>
                          </div>
             
                          <div class="edit-link">
                           <a class="link" href="avail_schedule.php?staff_id=
                           <?=$key['id'];?>&users_id=<?= $_GET['id']; ?>">日付を選択する</a>
                          </div>
                          
                         </div>
                        </div>
                     <?php endforeach; ?>
                </div> 

                <div class="reverse-link">
                           <a class="link" href="../Main/Main/main.php">前のページへ戻る</a>
                </div>
            </div>
        </div>
    </main>
    <footer>
       <?php require(ROOT_PATH .'/Views/Reserve/footer.php'); ?>
    </footer>
</body>
</html>