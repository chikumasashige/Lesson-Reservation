<?php
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
  
  $shift_count = count($shift);


  require_once(ROOT_PATH .'/Controllers/Reserve/TimeController.php');
  $reserve_time = new TimeController;
  $limit = $reserve_time->shift();
  $day_shift = [];
  foreach($limit as $key){
    $day_shift[] =$key['day_shift'];
  }

  $count = array_count_values($day_shift);
 
  
  $reserve = array_keys($count,count($shift));

  


  $reserve_day = [];
  foreach($reserve as $key){
    $date = date('j', strtotime($key));
    $reserve_day[] = $date;
  }


?>