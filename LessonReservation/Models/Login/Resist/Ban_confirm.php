<?php
   if(
       (empty($_SESSION['flg']))
       &&
       (empty($_SESSION['name']))
       &&
       (empty($_SESSION['kana']))
       &&
       (empty($_SESSION['email']))
       &&
       (empty($_SESSION['code']))
       &&
       (empty($_SESSION['address']))
       &&
       (empty($_SESSION['password']))
       &&
       (empty($_SESSION['inst']))
   )
   {
       header('Location: login.php');
       exit();
   }elseif(
       (!empty($_SESSION['flg']))
       &&
       (!empty($_SESSION['name']))
       &&
       (!empty($_SESSION['kana']))
       &&
       (!empty($_SESSION['email']))
       &&
       (!empty($_SESSION['code']))
       &&
       (!empty($_SESSION['address']))
       &&
       (!empty($_SESSION['password']))
       &&
       (!empty($_SESSION['inst'])) 
   ){
       $name=$_SESSION['name'];
       $kana = $_SESSION['kana'];
       $email = $_SESSION['email'];
       $tel = $_SESSION['tel'];
       $code = $_SESSION['code'];
       $address = $_SESSION['address'];
       $pass = $_SESSION['password'];
       $inst = $_SESSION['inst'];
       $body =  $_SESSION['body'];
   }
   
   


?>