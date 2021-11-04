<?php
function get_image() {

    if(!empty($_SESSION['image'])){

        $image = $_SESSION['image'];
        
        $path = '/img/staff/'.$image;
        echo $path;

      }elseif(empty($_SESSION['image'])){
        $path= '/img/lesson/default.png';
        echo $path;

      }
}
?>