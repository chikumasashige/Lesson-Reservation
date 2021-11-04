<?php
// YYYY年MM月DD日表示
$calender = $_GET['month'].$_GET['day'].'日';

//DATE型へ変更
$date = DateTime::createFromFormat('Y年m月d日', $calender);
// フォーマット変換
$day_time = $date->format('Y-m-d');
?>