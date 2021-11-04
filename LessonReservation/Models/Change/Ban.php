<?php
function MailBan(){
    if(!isset($_SESSION['flg']) && !isset($_SESSION['email'])){
        header('Location: /Login/login.php');
        exit();
    }
}

function ChangeBan(){
    if(!isset($_SESSION['flg'])){
        header('Location: /Login/login.php');
        exit();
    }
}
?>