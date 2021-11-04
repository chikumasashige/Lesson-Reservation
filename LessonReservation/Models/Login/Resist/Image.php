<?php
function get_image() {

    if(!empty($_SESSION['image'])){

        $image = $_SESSION['image'];
        
        $path = '/img/user/'.$image;
        echo $path;

      }elseif(empty($_SESSION['image'])){
        $path= '/img/user/default.png';
        echo $path;

      }
}
?>