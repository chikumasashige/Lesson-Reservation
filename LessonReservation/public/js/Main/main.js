//削除アラート表示機能
$('.delete').on('click',function(){
    if(!confirm('削除してもよろしいでしょうか？')){
      return false;
  }else{
      return true;
  }
  });




