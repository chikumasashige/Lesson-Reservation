//resist_confirmで登録完了アラート表示機能
function buttonClick(){
	if(!confirm('メールを送信しますがよろしいでしょうか？')){
		return false;
	}else{
		return true;
	}
}

let button =  document.getElementById('submit');

button.onclick = buttonClick;