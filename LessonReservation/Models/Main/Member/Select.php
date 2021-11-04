<?php

function DefaultInst(){


  // コントローラ取得
  require_once(ROOT_PATH .'/Controllers/Main/UsersController.php');
  $users = new UsersController;
   
  //楽器データ取得
  $inst = $users->inst();
  // ユーザーデータ取得
  $user = $users->views();
   

  foreach($inst as $key){
   $iname = $key['name'];
   $iid = $key['id'];
   if($iid === $user['inst_id']){
     echo '<option value="'.$iid.'">'.$iname.'</option>';
   }
  }
}



function SelectInst(){


    // コントローラ取得
    require_once(ROOT_PATH .'/Controllers/Main/UsersController.php');
    $users = new UsersController;
     
    //楽器データ取得
    $inst = $users->inst();
    // ユーザーデータ取得
    $user = $users->views();
     
  
    foreach($inst as $key){
     $iname = $key['name'];
     $iid = $key['id'];
     if($iid === $user['inst_id']){
        continue;
      }else{
         echo '<option value="'.$iid.'">'.$iname.'</option>';
      }
    }
  }

?>