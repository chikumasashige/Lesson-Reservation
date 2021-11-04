//削除アラート表示機能
$('.delete').on('click',function(){
    if(!confirm('予約をキャンセルしてもよろしいでしょうか？')){
      return false;
  }else{
      return true;
  }
  });




