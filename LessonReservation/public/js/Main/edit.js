
//画像preview機能
function previewImage(obj)
{


   
	var fileReader = new FileReader();
	fileReader.onload = (function() {
		document.getElementById('image').src = fileReader.result;
	});
	fileReader.readAsDataURL(obj.files[0]);

}

//resist_confirmで登録完了アラート表示機能
function buttonClick(){
	if(!confirm('編集を完了しますがよろしいでしょうか？')){
		return false;
	}else{
		return true;
	}
}

let button =  document.getElementById('resist');

button.onclick = buttonClick;