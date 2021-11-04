<?php
function get_image() {
     // コントローラ取得
     require_once(ROOT_PATH .'/Controllers/Main/UsersController.php');
     $users = new UsersController;
     // ユーザーデータ取得
     $user = $users->views();
    if(isset($user['image'])){

        $image = $user['image'];
        
        $path = '/img/user/'.$image;
        echo $path;

      }elseif(!isset($user['image'])){
        $path= '/img/default.png';
        echo $path;

      }
}
?>