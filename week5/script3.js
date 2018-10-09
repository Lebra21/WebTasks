function addN(){
	var students = document.getElementById('students').insertRow(3);
	var c1 = students.insertCell(0);
	var c2 = students.insertCell(1);
	var c3 = students.insertCell(2);
	c1.innerHTML = document.getElementById('name').value;
	c2.innerHTML = document.getElementById('surname').value;
	c3.innerHTML = document.getElementById('faculty').value;
}
function delAll(){
	var students1 = document.getElementById('students');
	students.parentNode.removeChild(students);
}
