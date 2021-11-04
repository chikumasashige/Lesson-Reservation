<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    //コントローラ読み込み
   require_once(ROOT_PATH .'/Controllers/Main/UsersController.php');
   $users = new UsersController();
   foreach($user as $key){
       $_SESSION['member_id'] = $key['id'];

       print_r($_SESSION['member_id']);
       header('Location: ../../Reserve/reserve_select.php');
   }
}
?>