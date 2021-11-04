<?php


// フォーマット変更
require_once(ROOT_PATH .'/Models/Reserve/Time.php');

// 予約機能
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  require_once(ROOT_PATH .'/Models/Reserve/Send.php');
    require_once(ROOT_PATH .'/Controllers/Reserve/TimeController.php');
    $time = new TimeController;
    $shift = $time->time();
    header('Location: complete_reserve.php');
}

//時間帯
$shift = [
  '10:00~11:00',
  '11:00~12:00',
  '13:00~14:00',
  '14:00~15:00',
  '15:00~16:00',
  '16:00~17:00',
  '17:00~18:00',
  '18:00~19:00',
  '19:00~20:00'
];


require_once(ROOT_PATH .'/Models/Reserve/Shift.php');

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/Reserve/reserve.css">
    <title>Lesson Resrvation -　空き状況確認</title>
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
               <h1>レッスン予約</h1>
             </div>
             <div id="text-box"></div>
            </div>
          </div>
              <div id="reserve">
                <div id="text2">
                  <p>予約したい時間を選択してください。</p><p><font color="red">*</font>希望の時間帯が表示されない場合はすでに満員なりますのであらかじめご了承ください。</p>
                </div>
                <div id="calender">
                  <h2><?= $calender ?></h2>
                </div>
                <div id="time-wrapp">
                  <p id="time-text">時間：</p>
                  <div id="time-box">
                   <form action="" method="POST">
                     <select name="shift" id="time">
                       <?php foreach($shift as $key):?>
                         <option  value="<?=$key;?>"><?=$key;?></option>
                       <?php endforeach; ?>
                     </select>
                     <div id="button-box">
                      <input type="hidden" name="staff_id" value="<?=$_GET['staff_id'];?>">
                      <input type="hidden" name="users_id" value="<?=$_GET['users_id'];?>">
                      <input type="hidden" name="time"value="<?=$day_time;?>">
                      <input id="button" type="submit" value="予約する">
                      
                     </div>
                    </form>
                  </div>
                </div>
              </div>
              <div id="reverse">
                  <a href="javascript:history.back()">前のページへ戻る</a>
              </div>

    </main>


    <footer>
       <?php require(ROOT_PATH .'/Views/Reserve/footer.php'); ?>

    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="/js/Reserve/calender.js"></script>
    
</body>
</html>