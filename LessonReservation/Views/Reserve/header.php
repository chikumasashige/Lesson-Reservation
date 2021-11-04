<?php
//ログアウト機能
if (isset($_POST['logout'])){
  session_destroy();
  header('Location: ../Login/login.php');
  excute();
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
    <link rel="stylesheet" href="/css/Main/main-headfoot.css">
    <title>Lesson Reservstion - ヘッダー</title>
</head>
<body>

    <a href="/Main/Main/main.php">
      <div id="head-img">
        <h1 id="tittle">Lesson Reservation</h1>
      </div>
    </a>
  <div id="head-box">
    <div id="main-link">
     <a href="/Main/Main/main.php">メインページ</a>
    </div>
    <div id="logout-link">
   <form method="POST" name="logout_form" action="" novalidate> 

    <a  href="javascript:logout_form.submit()">ログアウト
     <input type="hidden" name="logout">
    </a>
 
   </form> 
   </div>
  </div>
</body>
</html>