<?php

function DefaultInst(){


  // コントローラ取得
  require_once(ROOT_PATH .'/Controllers/Main/StaffController.php');
  $staff = new StaffController;
   
  //楽器データ取得
  $inst = $staff->inst();
  // ユーザーデータ取得
  $instructor = $staff->views();
   

  foreach($inst as $key){
   $iname = $key['name'];
   $iid = $key['id'];
   if($iid === $instructor['inst_id']){
     echo '<option value="'.$iid.'">'.$iname.'</option>';
   }
  }
}



function SelectInst(){


     require_once(ROOT_PATH .'/Controllers/Main/StaffController.php');
     $staff = new StaffController;
      
     //楽器データ取得
     $inst = $staff->inst();
     // ユーザーデータ取得
     $instructor = $staff->views();
     
  
    foreach($inst as $key){
     $iname = $key['name'];
     $iid = $key['id'];
     if($iid === $instructor['inst_id']){
        continue;
      }else{
         echo '<option value="'.$iid.'">'.$iname.'</option>';
      }
    }
}

?>