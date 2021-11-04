<?php
class Getdata{
   public function Member(){
       //コントローラ読み込み
      require_once(ROOT_PATH .'/Controllers/Main/UsersController.php');
      $users = new UsersController();
      //全ユーザーデータ取得
      $all = $users->all();
      
      // 会員データ
      $temp = [];
      
      foreach($all['users'] as $key['users']){
      
        
        if(!empty($_GET['mamber_id'])){
          if($_GET['mamber_id']==$key['users']['id']){
            $temp[] = $key['users'];
          }
        }elseif(!empty($_GET['mamber_name'])){
          if($_GET['mamber_name']==$key['users']['name']){
            $temp[] = $key['users'];
          }
        }else{
          $temp[] = $key['users'];
        }
      
      
      
      }
      
      $user_data = $temp;
      return $user_data;
   }
   
   public function Staff(){
       //コントローラ読み込み
      require_once(ROOT_PATH .'/Controllers/Main/StaffController.php');
      $staff = new StaffController;
   
      //全スタッフデータ取得
      $instructor = $staff->all();
   
      $temp = [];
   
      foreach($instructor['staff'] as $key['staff']){
   
       
       if(!empty($_GET['staff_id'])){
         if($_GET['staff_id']==$key['staff']['id']){
           $temp[] = $key['staff'];
         }
   
       }elseif(!empty($_GET['staff_name'])){
         if($_GET['staff_name']==$key['staff']['name']){
           $temp[] = $key['staff'];
         }
       }else{
         $temp[] = $key['staff'];
       }
   
   
      }
   
       $staff_data = $temp ;
       return $staff_data;
   }
}
?>