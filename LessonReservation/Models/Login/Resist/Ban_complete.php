<?php
   if(!isset($_SESSION['flg1'])){
    header('Location: login.php');
    exit();
   }elseif(isset($_SESSION['flg1'])){
    unset($_SESSION['name']);
    unset($_SESSION['kana']);
    unset($_SESSION['email']);
    unset($_SESSION['code']);
    unset($_SESSION['address']);
    unset($_SESSION['password']);
    unset($_SESSION['inst']);
   }
?>