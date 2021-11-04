<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // メールアドレス取得
    require_once(ROOT_PATH .'/Controllers/Reserve/UsersController.php');
    $users = new UsersController;
    $user = $users->users();
    $time =$_POST['time'];
    $shift = $_POST['shift'];
         // メール送信内容
         mb_language("Japanese");
         mb_internal_encoding("UTF-8");
        
          foreach($user as $key){
            $to = $key['email'] ;
            $title = $key['name'].'様予約していただきありがとうございます。';
            $content = 
            '※このメールはシステムからの自動返信です。'
            ."\n"."\n"
            .$key['name'].'様'
            ."\n"."\n"
            .'お世話になっております。'."\n".'Lesson Reservation へ予約していただきありがとうございました。'
            ."\n"."\n"
            .'以下の内容でレッスンを予約させていただきました。'."\n".'お間違いがないか再度ご確認くださいませ。'
            ."\n".'レッスンの予約をキャンセルされる際は「予約状況確認」のページからキャンセルできます。'
            ."\n"."\n"
            .'━━━━━━***　予約内容　***━━━━━━'
            ."\n".'レッスン時間：'.$time.'  '.$shift
            ."\n".'━━━━━━━━━━━━━━━━━━━━━━━━━';
            
             
            
            $result = mb_send_mail($to, $title, $content);
          }
}
?>