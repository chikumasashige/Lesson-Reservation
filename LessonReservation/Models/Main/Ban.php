<?php
function Ban(){
  if(
      (empty($_SESSION['flg']))
      &&
      (empty($_SESSION['email']))
      &&
      (empty($_SESSION['id']))
    )
   {
     header('Location: /Login/login.php');
     exit();
   }elseif(
    (!empty($_SESSION['flg']))
    &&
    (!empty($_SESSION['email']))
    &&
    (!empty($_SESSION['id']))
   ){
       $id = $_SESSION['id'];
       $email = $_SESSION['email'];
       unset($_SESSION['flg']);
   }
}

function ScheduleBan(){
  if(!isset($_GET['users'])){
    header('Location:../Main/main.php ');
    exit();
  }
}



?>