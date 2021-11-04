<?php
class Complete{
    public function AccessSite(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $flg = mt_rand(1,99999);
            $_SESSION['flg1'] = $flg;
            unset($_SESSION['flg']);
            header('Location: resist_complete.php');
            exit();
        }
    }
}
?>