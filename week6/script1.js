let buttons = document.getElementsByTagName('button');
for(let i=0; i<buttons.length;i++){
    buttons[i].addEventListener("click",function(){
        buttons[i].parentNode.childNodes[1].style.textDecoration = "line-through";
    });
}












/*
function clickFn(){
	document.querySelector('span').style.textDecoration = "line-through";

}

let divItems = document.querySelectorAll('div button')
for (let Item of divItems){
	Item.addEventListener('click',clickFn);
}*/



/*document.querySelector('button').onclick = function(){
	document.querySelector('span').style.textDecoration = "line-through";
}
document.getElementById('myButton1').onclick = function(){
	document.getElementById('myElement1').style.textDecoration = "line-through";
}
document.getElementById('myButton2').onclick = function(){
	document.getElementById('myElement2').style.textDecoration = "line-through";
}
document.getElementById('myButton3').onclick = function(){
	document.getElementById('myElement3').style.textDecoration = "line-through";
}
document.getElementById('myButton4').onclick = function(){
	document.getElementById('myElement4').style.textDecoration = "line-through";
}
*/
/*function through(){
	var element = document.getElementById('myElement');
	for(i=0; i < element.length; i++){
		element[i].style.textDecoration = 'line-through';
	}
}*/