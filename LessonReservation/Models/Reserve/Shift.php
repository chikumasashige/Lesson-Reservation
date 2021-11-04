<?php
   require_once(ROOT_PATH .'/Controllers/Reserve/TimeController.php');
   $reserve_time = new TimeController;
   $limit = $reserve_time->shift();

   
   $temp = [];
   foreach($limit as $key){
     $day_shift = $key['day_shift'];
     $time_shift = $key['time_shift'];
   
     if($day_shift === $day_time){
       $temp[] = $time_shift ;
     }
   }
   $time_shift = $temp;
   $shift = array_diff($shift, $time_shift);
?>