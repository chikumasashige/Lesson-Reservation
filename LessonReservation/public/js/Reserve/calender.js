
function buttonClick(){
	if(!confirm('予約を完了しますがよろしいでしょうか？')){
		return false;
	}else{
		return true;
	}
}

let button =  document.getElementById('button');

button.onclick = buttonClick;
// // $('#text1').click(function() {
// //     // $('#overlay').addClass('hidden');
// //     var text = $(this).data('aa');
// // });



