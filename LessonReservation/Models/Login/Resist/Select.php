<?php
function DefaultInst(){


    require_once(ROOT_PATH .'/Controllers/Login/ResistControllers.php');

    $resist = new ResistController;
    
    
    
    
    // 楽器選択機能
    $inst = $resist->inst();
        if(!empty($_POST['inst'])){
            foreach($inst as $key){
             $iname = $key['name'];
             $iid = $key['id'];
             if($iid === $_POST['inst']){
               echo '<option value="'.$iid.'">'.$iname.'</option>';
             }
            }
          }elseif(empty($_POST['inst'])){
           echo  '<option value="">'.'楽器選択'.'</option>';;
        }
}

function SelectInst(){

    require_once(ROOT_PATH .'/Controllers/Login/ResistControllers.php');

    $resist = new ResistController;
    
    
    
    
    // 楽器選択機能
    $inst = $resist->inst();


    foreach($inst as $key){
      $iname = $key['name'];
      $iid = $key['id']; 
      if($iid === $_POST['inst']){
        continue;
      }else{
         echo '<option value="'.$iid.'">'.$iname.'</option>';
      }
    } 
}


function ConfirmInst(){


    require_once(ROOT_PATH .'/Controllers/Login/ResistControllers.php');

    $resist = new ResistController;
    
    
    
    
    // 楽器選択機能
    $inst = $resist->inst();

            foreach($inst as $key){
             $iname = $key['name'];
             $iid = $key['id'];
             if($iid === $_SESSION['inst']){
               echo '<h3 class="post">'.$iname.'</h3>';
             }
            }
}



?>