<?php
// ダイレクトアクセス禁止
require_once(ROOT_PATH .'/Models/Main/Ban.php');
ScheduleBan();
require_once(ROOT_PATH .'/Controllers/Main/UsersController.php');

$time = new UsersController;


// キャンセル機能
if(isset($_GET['id'])){
  $cancell = $time->cancel();
  // header('Location:../Main/main.php ');
}

// 予約情報取得
$schedule = $time->schedule();






?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/Main/Member/check_schedule.css">
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
            <h1>予約確認</h1>
          </div>
          <div id="box"></div>
        </div>
        <div id="main-wrapp">
          
          <table  borderColor="blue"id="table">
　　　　  　　<tr class="tr">
　　　　  　　　　<th class="th1">予約時間</th>
　　　　  　　　　<th class="th2"></th>
　　　　  　　</tr>
           <?php foreach($schedule as $key):?>
　　　　  　　 <tr>
　　　　  　　 　　<td class="td1"><?= $key['day_shift'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$key['time_shift'] ?></td>
　　　　  　　 　　<td class="td2">
                   <div id="link-box">
                     <a class="delete" href="?id=<?= $key['id'];?>&users=<?= $_GET['users'];?>">キャンセル</a>
                   </div>
                </td>
               
　　　　  　　 </tr>
            <?php endforeach; ?> 
　　　　  　</table>
        </div>

          <div id="reverse">
                  <a href="../Main/main.php">前のページへ戻る</a>
          </div>
        </main>
    <footer>
     <?php require(ROOT_PATH .'/Views/Main/footer.php'); ?>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="/js/Main/check.js"></script>
</body>
</html>