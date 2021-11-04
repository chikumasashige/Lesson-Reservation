<?php

function SelectInst(){
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


?>