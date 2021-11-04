<?php

require("calender.php");
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/Reserve/avail_schedule.css">
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


         <div id="wrapp">
           <div class="container">
               <div id="month-box">
                 <h3 class="mb-5">
                     <a href="?ym=<?php echo $prev; ?>&staff_id=<?= $_GET['staff_id']; ?>&users_id=<?= $_GET['users_id']; ?>">&lt;</a> 
                     <?php echo $html_title; ?> 
                     <a href="
                 ?ym=<?php echo $next; ?>&staff_id=<?= $_GET['staff_id']; ?>&users_id=<?= $_GET['users_id']; ?>">&gt;</a></h3>
               </div>

              <div id="table-box">
               <table class="table-bordered">
                   <tr id="week">
                       <th>日</th>
                       <th>月</th>
                       <th>火</th>
                       <th>水</th>
                       <th>木</th>
                       <th>金</th>
                       <th>土</th>
                   </tr>
                   
                   <?php foreach($weeks as $week): ?>
                    
                    <tr>
                     <?= $week ?>

                    </tr>
                   <?php endforeach; ?>
               </table>
              </div>

           </div>
         </div>
         <div id="reverse">
                  <a href="javascript:history.back()">前のページへ戻る</a>
          </div>
         <!-- <div id="overlay">
              <div id="reserve">
                <div id="reserve-text">
                  <h3>予約したい時間を選択してください。</h3>
                </div>
                <div id="calender">
                  <h2><?= $calender ?></h2>
                </div>
                <div id="time-wrapp">
                  <p id="time-text">時間：</p>
                  <div id="time-box">
                   <form action="" method="GET">
                     <select name="time" id="time">
                       <option value="">時間を選択</option>
                       <?php foreach($time as $key):?>
                         <option value="<?=$key;?>"><?=$key;?></option>
                       <?php endforeach; ?>
                     </select>
                     <div id="button-box">
                      <input id="button" type="submit" value="予約する">
                     </div>
                    </form>
                  </div>
                </div>
                
              </div>

         </div> -->

    </main>


    <footer>
       <?php require(ROOT_PATH .'/Views/Reserve/footer.php'); ?>

    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="/js/Reserve/calender.js"></script>
    
</body>
</html>