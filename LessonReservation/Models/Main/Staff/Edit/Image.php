<?php
    function get_image() {
    // // コントローラ取得
    require_once(ROOT_PATH .'/Controllers/Main/StaffController.php');
    $staff = new StaffController;
    // // ユーザーデータ取得
    $instructor = $staff->views();
    if(isset($instructor['image'])){

        $image =$instructor['image'];
        
        $path = '/img/staff/'.$image;
        echo $path;

      }elseif(!isset($instructor['image'])){
        $path= '/img/default.png';
        echo $path;

      }
}
?>