<?php
//楽器名取得
$temp = [];
foreach($inst as $key){
  $iname = $key['name'];
  $iid = $key['id'];
  if($iid === $_SESSION['inst']){
    $temp[] =$iname;

  }
 }
 $inst_name = $temp;

// 楽器選択機能
$inst = $resist->inst();
      // メール送信内容
      mb_language("Japanese");
      mb_internal_encoding("UTF-8");
      
      if(isset($_POST["submit"])){
         $to = $email ;
         $title = $name.'様ご登録していただきありがとうございます。';
         $content = 
         '※このメールはシステムからの自動返信です。'
         ."\n"."\n"
         .$name.'様'
         ."\n"."\n"
         .'お世話になっております。'."\n".'Lesson Reservation へのご登録していただきありがとうございました。'
         ."\n"."\n"
         .'以下の内容でご登録させていただきました。'."\n".'お間違いがないか再度ご確認くださいませ。'
         ."\n"."\n"
         .'━━━━━━***　ご登録内容　***━━━━━━'
         ."\n".'お名前：'.$name
         ."\n".'フリガナ：'.$kana
         ."\n".'E-Mail：'.$email
         ."\n".'電話番号：'.$tel
         ."\n".'住所：'.$code."\n".$address
         ."\n".'担当楽器：'.$inst_name[0]
         ."\n"."\n"
         .'登録日時：'.date( "Y年m月d日 H時i分" )."\n"
         .'登録内容：'."\n"
         .$body."\n".
         'http://localhost/Change/change.php'
         ."\n"
         .'━━━━━━━━━━━━━━━━━━━━━━━━━';
         
          
         
         $result = mb_send_mail($to, $title, $content);
      }

?>